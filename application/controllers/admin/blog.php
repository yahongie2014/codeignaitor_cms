<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('blog_model');
        $this->load->model( "tag_model" );
        $this->load->model( "natag_model" );
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_blog'] = true;
        $this->session->keep_flashdata('image_msg');
    }

    public function index() {
        $this->data['page_title'] = lang('blog');
        $returnedData = $this->blog_model->get(NULL, $this->GetLang);

        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/blog/show');
    }

    public function form() {
        $this->data['page_title'] = lang('blog');
        $data['returnedData'] = '';
        $data['tags'] = $this->tag_model->getTitle(array('type' => 'blog'), $this->GetLang);

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->blog_model->get($id);
            $data['returnedData'] = $returnedData;
            if(!empty($returnedData)){
                $returnedData->adminName = $this->admin_ion_auth->user($returnedData->userId)->row()->username;
            }
            $articleTagsARR = $this->tag_model->getExtend(array('newsArticleId' => $id, 'type' => 'blog'));
            $articleTags = '';
            if(!empty($articleTagsARR)){
                foreach ($articleTagsARR as $value) {
                    if(!empty($value->id)){
                        $articleTags[] = $value->id;
                    }
                }
            }
            $data['articleTags'] = $articleTags;
        }

        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title'), 'rules' => 'trim|required'),
            array('field' => 'descAR', 'label' => lang('arabic_content'), 'rules' => 'trim|required'),
            array('field' => 'descGE', 'label' => lang('content'), 'rules' => 'trim|required'),
            array('field' => 'autherAR', 'label' => lang('auther'), 'rules' => 'trim|required'),
            array('field' => 'autherGE', 'label' => lang('auther'), 'rules' => 'trim|required')
            );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        } else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                $blogData['userId'] = $this->admin_ion_auth->user()->row()->id;
                $blogData['titleAR'] = $postedArray['titleAR'];
                $blogData['titleGE'] = $postedArray['titleGE'];
                $blogData['autherAR'] = $postedArray['autherAR'];
                $blogData['autherGE'] = $postedArray['autherGE'];

                $tagsArr = $postedArray['tagId'];

                // post descriptions as it is without filtering
                global $unsanitized_post;

                $blogData['descAR'] = $unsanitized_post['descAR'];
                $blogData['descGE'] = $unsanitized_post['descGE'];

                //upload image
                $config['upload_path'] = './application/views/images/upload/blog/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload("image")) {
                        //get new image name
                        $uploaded_image = $this->upload->file_name;
                        $blogData['image'] = $uploaded_image;
                        if(!empty($returnedData)){
                            //delete old image
                            $file = $config['upload_path'].$returnedData->image;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".lang('insert_error').' '.$this->upload->display_errors()."</div>");
                        redirect('admin/blog/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");

                if (!empty($id)) { //update
                    $blogData['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->blog_model->update($blogData, $id)) {
                        //tags
                        if(!empty($tagsArr)) {
                            //delete old
                            $this->natag_model->delete($id, 'blog');
                            foreach($tagsArr as $key => $value){
                                //insert again
                                $tagData['tagId'] = $value;
                                $tagData['newsArticleId'] = $id;
                                $this->natag_model->insert($tagData);
                            }
                        }
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/blog/form/' . $id, 'location');
                    }
                } //end id
                else { //insert
                    $blogData['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->blog_model->insert($blogData);
                    if ($id) {
                        //tags
                        if(!empty($tagsArr)) {
                            //delete old
                            //$this->natag_model->delete($id, 'blog');
                            foreach($tagsArr as $key => $value){
                                //insert again
                                $tagData['tagId'] = $value;
                                $tagData['newsArticleId'] = $id;
                                $this->natag_model->insert($tagData);
                            }
                        }
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                }
                redirect('admin/blog' , 'location');
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/blog/form');
    }

    function delete() {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                $this->blog_model->delete($id);
            }
        } else {            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->blog_model->delete($id);
            }
        }
        redirect('admin/blog', 'location');
    }

    function tags(){
        $tagsArr = '';
        $tags = $this->tag_model->get(array('type' => 'blog'));
        if (!empty($tags)) {
            foreach ($tags as $t) {
                // $tagsArr['id'] = $t->id;
                $tagsArr[] = $t->title;
            }
        }
        echo json_encode($tagsArr);
    }
}