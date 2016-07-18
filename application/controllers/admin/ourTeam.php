<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class OurTeam extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('our_team_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_our_team'] = true;
        $this->session->keep_flashdata('image_msg');
    }

    public function index() {
        $this->data['page_title'] = lang( 'our_team' );
        $returnedData = $this->our_team_model->getWithLanguage(NULL, $this->GetLang);

        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/ourTeam/show');
    }

    public function form() {
        $this->data['page_title'] = lang( 'our_team' );
        $data['returnedData'] = '';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->our_team_model->get($id);
            $data['returnedData'] = $returnedData;
            if(!empty($returnedData)){
                $returnedData->adminName = $this->admin_ion_auth->user($returnedData->userId)->row()->username;
            }
        }

        $validation_rules = array(
            array('field' => 'nameAR', 'label' => lang('name_ar'), 'rules' => 'trim|required'),
            array('field' => 'nameGE', 'label' => lang('Name'), 'rules' => 'trim|required'),
            array('field' => 'descAR', 'label' => lang('arabic_content'), 'rules' => 'trim|required'),
            array('field' => 'descGE', 'label' => lang('content'), 'rules' => 'trim|required'),
            array('field' => 'facebook', 'label' => lang('facebook_url'), 'trim|valid_url_format'),
            array('field' => 'linkedIn', 'label' => lang('linkedin_url'), 'trim|valid_url_format'),
            array('field' => 'twitter', 'label' => lang('twitter_url'), 'trim|valid_url_format'),
            array('field' => 'gender', 'label' => lang('gender'), 'rules' => 'required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        } else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                //upload image
                $config['upload_path'] = './application/views/images/upload/ourTeam/';
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
                        redirect('admin/ourTeam/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->our_team_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/ourTeam', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/ourTeam/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");

                    if ($this->our_team_model->insert($postedArray)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/ourTeam' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/ourTeam/form');
    }

    function delete()
    {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                $this->our_team_model->delete($id);
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->our_team_model->delete($id);
            }
        }
        redirect('admin/ourTeam', 'location');
    }
}