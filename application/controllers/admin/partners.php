<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Partners extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('partner_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_website'] = true;
        $this->data['admin_menu_partners'] = true;
        $this->session->keep_flashdata('image_msg');

        //permissions
        if ($this->admin_ion_auth->in_group(array('secretary'))) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }
    }

    public function index() {
        $this->data['page_title'] = lang( 'partners' );
        $returnedData = $this->partner_model->getWithLanguage(NULL, $this->GetLang);

        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/partners/show');
    }

    public function form() {
        $this->data['page_title'] = lang( 'partners' );
        $data['returnedData'] = '';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->partner_model->get($id);
            if(!empty($returnedData)){
                $returnedData->adminName = $this->admin_ion_auth->user($returnedData->userId)->row()->username;
            }
            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'nameAR', 'label' => lang('Name').' ('.lang('arabic').')', 'rules' => 'trim|required'),
            array('field' => 'nameGE', 'label' => lang('Name').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'website', 'label' => lang( 'website' ), 'rules' => 'trim|required|valid_url_format' )
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST)
            {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                //upload logo
                $config['upload_path'] = './application/views/images/upload/partners/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!empty($_FILES['logo']['name'])) {
                    if ($this->upload->do_upload("logo")) {
                        //get new image name
                        $uploaded_image = $this->upload->file_name;
                        $postedArray['logo'] = $uploaded_image;
                        if(!empty($returnedData)){
                            //delete old image
                            $file = $config['upload_path'].$returnedData->logo;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>");
                        redirect('admin/partners/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->partner_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/partners', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/partners/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    if ($this->partner_model->insert($postedArray)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/partners' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/partners/form');
    }

    function delete()
    {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                $this->partner_model->delete($id);
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->partner_model->delete($id);
            }
        }
        redirect('admin/partners', 'location');
    }
}