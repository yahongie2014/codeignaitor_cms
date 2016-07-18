<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Front_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('contactus_model');
        $this->Data['menu_contact'] = true;
    }

    function index() {
        $this->Data['title'] = lang('front_contact');
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'contactContent'), $this->GetLang);
        //get contact info
        $data['contactInfo'] = $this->contactus_model->getContactInfoForFront(1, $this->GetLang);

        //show form and insert
        $this->form_validation->set_rules('name', lang('front_name'), 'trim|required');
        $this->form_validation->set_rules('email', lang('front_email'), 'trim|required|valid_email');
        $this->form_validation->set_rules('tel', lang('front_phone'), 'trim');
        $this->form_validation->set_rules('message', lang('front_message'), 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            $this->load->view('front/header', $this->Data);
            $this->load->view( 'front/contact', $data);
            $this->load->view('front/footer', $this->Data);
        } else {
            $postedArray = $this->input->post(NULL, TRUE);
            $dbData['name'] = $postedArray['name'];
            $dbData['tel'] = $postedArray['tel'];
            $dbData['email'] = $postedArray['email'];
            $dbData['message'] = $postedArray['message'];
            $dbData['date'] = date('Y-m-d H:i:s');
            if ($this->contactus_model->insertContact($dbData)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" >'.lang('contact_thanks').'</div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" >'.lang('front_insert_error').'</div>');
            }
            redirect('contact', 'location');
        }
    }
}