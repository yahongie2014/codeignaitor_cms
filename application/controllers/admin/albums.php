<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Albums extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('gallery_model');
        $this->load->model('galleryfiles_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_website'] = true;
        $this->data['admin_menu_gallery'] = true;
        $this->data['admin_menu_albums'] = true;
        $this->session->keep_flashdata('image_msg');

        //permissions
        if ($this->admin_ion_auth->in_group(array('secretary'))) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }
    }

    public function index() {
        $this->data['page_title'] = lang('albums');
        $returnedData = $this->gallery_model->getWithLanguage(array('type' => 1), $this->GetLang);
        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/albums/show');
    }

    /**
     * add, edit forms for albums
     */
    public function form() {
        $this->data['page_title'] = lang('albums');
        $data['returnedData'] = '';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->gallery_model->get($id);
            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required|xss_clean'),
            array('field' => 'titleGE', 'label' => lang('title'), 'rules' => 'trim|required|xss_clean'),
            array('field' => 'isActive', 'label' => lang('isActive'), 'rules' => 'required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            //set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('msg'));
        }else {
            if($_POST){

                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;
                $postedArray['type'] = 1;

                //upload image
                $config['upload_path'] = './application/views/images/upload/gallery/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload("image")) {
                        //get new image name
                        $uploaded_image = $this->upload->file_name;
                        $postedArray['image'] = $uploaded_image;
                        if(!empty($returnedData)){
                            //delete old image
                            $file = $config['upload_path'].$returnedData->image;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".lang('insert_error').' '.$this->upload->display_errors()."</div>");
                        redirect('admin/albums/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");
                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->gallery_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/albums/images/'.$id, 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/albums/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->gallery_model->insert($postedArray);
                    if ($id) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        redirect('admin/albums/images/'.$id, 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/albums' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/albums/form');
    }

    //Show album images
    public function images() {
        $this->data['page_title'] = lang( 'images' );
        $galleryId = $this->uri->segment(4);
        if(!empty($galleryId)) {
            $data['galleryId'] = $galleryId;
            $returnedData = $this->galleryfiles_model->getWithLanguage(array('galleryId' => $galleryId), $this->GetLang);
            if(!empty($returnedData)){
                foreach ($returnedData as $item) {
                    $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                }
            }
            $data['returnedData'] = $returnedData;
        }

        $this->load->vars($data);
        $this->render('admin/albums/images');
    }

    /**
     * add, edit forms for images
     */
    public function imageForm() {
        $this->data['page_title'] = lang('images');
        $data['returnedData'] = '';

        $galleryId = (int) $this->uri->segment(4);
        $id = (int) $this->uri->segment(5);
        if (!empty($id)) {
            $returnedData = $this->galleryfiles_model->get($id);
            $data['returnedData'] = $returnedData;
        }

        if(!empty($galleryId)) {
            $data['galleryId'] = $galleryId;
            $validation_rules = array(
                array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required|xss_clean'),
                array('field' => 'titleGE', 'label' => lang('title'), 'rules' => 'trim|required|xss_clean')
            );
            $this->form_validation->set_rules($validation_rules);

            if ($this->form_validation->run() == false) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
                //set the flash data error message if there is one
                $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('msg'));
            }else {
                if($_POST){

                    $postedArray = $this->input->post( NULL, TRUE );
                    $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;
                    $postedArray['galleryId'] = $galleryId;
                    //upload image
                    $config['upload_path'] = './application/views/images/upload/gallery/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '10000';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!empty($_FILES['fileName']['name'])) {
                        if ($this->upload->do_upload("fileName")) {
                            //get new image name
                            $uploaded_image = $this->upload->file_name;
                            $postedArray['fileName'] = $uploaded_image;
                            if(!empty($returnedData)){
                                //delete old image
                                $file = $config['upload_path'].$returnedData->fileName;
                                @unlink($file);
                            }
                        } else {
                            $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".lang('insert_error').' '.$this->upload->display_errors()."</div>");
                            redirect('admin/albums/imageForm/'.$galleryId.'/'. $id, 'location');
                        }
                    }

                    //empty image validation errors if there are any.
                    $this->session->set_flashdata('image_msg', "");

                    if (!empty($id)) { //update
                        $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                        if ($this->galleryfiles_model->update($postedArray, $id)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                            redirect('admin/albums/images/'.$galleryId, 'location');
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                            redirect('admin/albums/imageForm/'.$galleryId.'/'. $id, 'location');
                        }
                    }//end id
                    else{//insert
                        $postedArray['addingDate'] = date("Y-m-d H:i:s");
                        $id = $this->galleryfiles_model->insert($postedArray);
                        if ($id) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                        }
                        redirect('admin/albums/images/'.$galleryId, 'location');
                    }
                }//post
            }//else
            $this->load->vars($data);
            $this->render('admin/albums/image');
        }
        else {
            redirect('admin/albums', 'location');
        }
    }

    function delete()
    {
        $id = (int) $this->uri->segment(4);
        $type = $this->uri->segment(5);
        $galleryId = (int) $this->uri->segment(6);
        if (!empty($id)) {
            if(!empty($type) && !empty($galleryId)) {
                if($type == 'image') {
                    $this->galleryfiles_model->delete($id);
                }
                redirect('admin/albums/images/'.$galleryId, 'location');
            } else {
                //delete album
                $this->gallery_model->delete($id);
                $this->galleryfiles_model->delete(array('galleryId' => $id));

                redirect('admin/albums', 'location');
            }
        }
    }
}