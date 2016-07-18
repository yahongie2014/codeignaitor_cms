<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('testimonial_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_testimonials'] = true;
        $this->data['admin_menu_testimonials_show'] = true;
    }

    public function index() {
        $this->data['page_title'] = lang('testimonials');
        $returnedData = $this->testimonial_model->getWithLanguage(NULL, $this->GetLang);
        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/testimonials/show');
    }

    public function form() {
        $this->data['page_title'] = lang( 'testimonials' );
        $data['returnedData'] = '';

            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $returnedData = $this->testimonial_model->get($id);
                $data['returnedData'] = $returnedData;
            }

            $validation_rules = array(
                array('field' => 'testimonialAR', 'label' => lang('arabic_content'), 'rules' => 'trim|required'),
                array('field' => 'testimonialGE', 'label' => lang('content'), 'rules' => 'trim|required'),
                array('field' => 'nameAR', 'label' => lang('Name'), 'rules' => 'trim|required'),
                array('field' => 'nameGE', 'label' => lang('Name'), 'rules' => 'trim|required')
            );
            $this->form_validation->set_rules($validation_rules);

            if ($this->form_validation->run() == false) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            }else {
                if($_POST)
                {
                    $postedArray = $this->input->post( NULL, TRUE );
                    $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                    if (!empty($id)) { //update
                        $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                        if ($this->testimonial_model->update($postedArray, $id)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                            redirect('admin/testimonials', 'location');
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                            redirect('admin/testimonials/form/' . $id, 'location');
                        }
                    }//end id
                    else{//insert
                        $postedArray['addingDate'] = date("Y-m-d H:i:s");

                        if ($this->testimonial_model->insert($postedArray)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                        }
                        redirect('admin/testimonials' , 'location');
                    }
                }//post
            }//else
        $this->load->vars($data);
        $this->render('admin/testimonials/form');
    }

    function delete() {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                $this->testimonial_model->delete($id);
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->testimonial_model->delete($id);
            }
        }
        redirect('admin/testimonials', 'location');
    }
}