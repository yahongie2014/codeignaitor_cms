<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('banner_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_banner'] = true;
        $this->data['admin_menu_banner_show'] = true;
    }

    public function index() {
        $this->data['page_title'] = lang('banner');
        $this->form();
    }

    public function form() {
        $this->data['page_title'] = lang('banner');
        $data['returnedData'] = '';

        $id = 1;
        if (!empty($id)) {
            $returnedData = $this->banner_model->get($id);
            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'title1AR', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title2AR', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title3AR', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title1GE', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title2GE', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title3GE', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'image', 'label' => lang('icon_image'), 'rules' => 'callback_handle_upload')

        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST){

                $postedArray = $this->input->post( NULL, TRUE );
                $bannerData['userId'] = $this->admin_ion_auth->user()->row()->id;
                $bannerData['lastModifiedDate'] = date("Y-m-d H:i:s");
                $bannerData['title1AR'] = $postedArray['title1AR'];
                $bannerData['title2AR'] = $postedArray['title2AR'];
                $bannerData['title3AR'] = $postedArray['title3AR'];
                $bannerData['title1GE'] = $postedArray['title1GE'];
                $bannerData['title2GE'] = $postedArray['title2GE'];
                $bannerData['title3GE'] = $postedArray['title3GE'];
                if(!empty($postedArray['image'])) {
                    $bannerData['image'] = $postedArray['image'];
                }

                if (!empty($returnedData)) { //update
                    if ($this->banner_model->update($bannerData, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                    }
                } else {//insert
                    $bannerData['id'] = $id;
                    if ($this->banner_model->insert($bannerData)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                }
                redirect('admin/banner' , 'location');
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/banner/form');
    }

    function handle_upload() {
        //upload image
        $config['upload_path'] = './application/views/images/upload/banner/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
          if ($this->upload->do_upload('image')) {
            // set a $_POST value for 'image' that we can use later
            $upload_data    = $this->upload->data();
            $_POST['image'] = $upload_data['file_name'];
            return true;
          }
          else {
            // throw an error
            $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
            return false;
          }
        }
        // else {
          // throw an error because nothing was uploaded
          // $this->form_validation->set_message('handle_upload', "You must upload an image (.jpg, .png, .jpeg)!");
          // return false;
        // }
    }
}