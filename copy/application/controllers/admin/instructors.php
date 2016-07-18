<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Instructors extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('instructor_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_website'] = true;
        $this->data['admin_menu_instructors'] = true;
        $this->session->keep_flashdata('image_msg');

    }

    public function index() {
        $this->data['page_title'] = lang( 'instructors' );
        $returnedData = $this->instructor_model->getWithLanguage(NULL, $this->GetLang);

        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/instructors/show');
    }

    public function form() {
        $this->data['page_title'] = lang( 'instructors' );
        $data['returnedData'] = '';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->instructor_model->get($id);
            $data['returnedData'] = $returnedData;
            if(!empty($returnedData)){
                $returnedData->adminName = $this->admin_ion_auth->user($returnedData->userId)->row()->username;
            }
        }

        $validation_rules = array(
            array('field' => 'nameAR', 'label' => lang('Name'), 'rules' => 'trim|required'),
            array('field' => 'nameGE', 'label' => lang('Name'), 'rules' => 'trim|required'),
            array('field' => 'descAR', 'label' => lang('arabic_content'), 'rules' => 'trim|required'),
            array('field' => 'descGE', 'label' => lang('content'), 'rules' => 'trim|required'),
            array('field' => 'gender', 'label' => lang('gender'), 'rules' => 'required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            //set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('msg'));
        }else {
            if($_POST)
            {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                $this->load->library('image_moo');
                //upload image
                $upload_path = './application/views/images/upload/instructors/';
                $height = 120;
                $width = 118;

                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload("image")) {
                        //get new image name
                        $uploaded_image = $this->upload->file_name;
                        //resize image
                        $this->image_moo->load($upload_path.$uploaded_image)->resize($height,$width)->save($upload_path.$uploaded_image,true);

                        $postedArray['image'] = $uploaded_image;
                        if(!empty($returnedData)){
                            //delete old image
                            $file = $config['upload_path'].$returnedData->image;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".lang('insert_error').' '.$this->upload->display_errors()."</div>");
                        redirect('admin/instructors/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->instructor_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/instructors', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/instructors/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");

                    if ($this->instructor_model->insert($postedArray)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/instructors' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/instructors/form');
    }

    function delete()
    {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                $this->instructor_model->delete($id);
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->instructor_model->delete($id);
            }
        }
        redirect('admin/instructors', 'location');
    }
}