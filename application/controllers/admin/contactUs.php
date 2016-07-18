<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ContactUs extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('contactus_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_contact'] = true;
        $this->data['admin_menu_contact_show'] = true;
        $this->data['page_title'] = lang( 'contact_us' );
    }

    //Show emails
    public function index() {
        $this->data['page_title'] = lang('contact_us');
        //get message
        $data['messages'] = $this->contactus_model->showAllMessages();
        $this->load->vars($data);
        $this->render('admin/contactUs/show');
    }

    public function single() {
        $ID = $this->uri->segment(4);
        if(!empty($ID)) {
            //get message
            $data['contactMessage'] = $this->contactus_model->geById($ID);
        }
        $this->load->vars($data);
        $this->render('admin/contactUs/viewSingle');
    }

    function delete() {
        $ID = (int) $this->uri->segment(4);
        if (!empty($ID)) {
            //delete row
            $this->contactus_model->delete($ID);
        }
        redirect('admin/contactUs', 'location');
    }

    function deleteMultiple() {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {
            foreach ($choosedItemArr as $ID) {
                //delete
                $this->contactus_model->delete($ID);
            }
        }
        redirect('admin/contactUs', 'location');
    }

    public function form() {
        $rowId = 1;
        $marker = array();
        //get contact info
        $contactInfo = $this->contactus_model->getContactInfo(1);//get the first row(it is the only row in this table)
        $data['contactInfo'] = $contactInfo;
        if (!empty($contactInfo)) {
            $latitude = $contactInfo->latitude;
            $lagitude= $contactInfo->lagitude;
        }
        else {
            $latitude = '30.0096557';
            $lagitude = '31.1889511';
        }
        $data['latitude'] = $latitude;
        $data['lagitude'] = $lagitude;

        ////////////
        //draw the map
        $this->load->library('googlemaps');
        $config['center'] = $latitude.', '.$lagitude;//latitude, lagitude of the company in google maps
        $config['zoom'] = '14';//'auto';
        $this->googlemaps->initialize($config);

        $marker['position'] =  $latitude.', '.$lagitude;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        ///////////////////////

        //validation rules
        $this->form_validation->set_rules('tel', lang('phone'), 'trim|min_length[7]|required');
        $this->form_validation->set_rules('email', lang('Email'), 'trim|required|valid_email');
        $this->form_validation->set_rules('paypalEmail', lang('paypalEmail'), 'trim|required|valid_email');
        $this->form_validation->set_rules('facebook', lang('facebook_url'), 'trim|valid_url_format');
        $this->form_validation->set_rules('linkedIn', lang('linkedin_url'), 'trim|valid_url_format');
        $this->form_validation->set_rules('twitter', lang('twitter_url'), 'trim|valid_url_format');

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            $this->load->vars($data);
            $this->render('admin/contactUs/form');
        } else {
            //get all form inputs' values
            $postedArray = $this->input->post(NULL, TRUE);

            if(!empty($contactInfo)) {
                $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");
                //update row
                if($this->contactus_model->updateAddress($postedArray, $rowId)) {
                    $this->session->set_flashdata('msg_class', 'alert alert-success');
                    $this->session->set_flashdata('msg', lang('update_success_message'));
                }
                else {
                    $this->session->set_flashdata('msg_class', 'alert alert-success');
                    $this->session->set_flashdata('msg', lang('update_error_message'));
                }
            }else {
                //insert row with id = 1
                $postedArray['id'] = $rowId;
                $postedArray['addingDate'] = date("Y-m-d H:i:s");

                if($this->contactus_model->insertAddress($postedArray)) {
                    $this->session->set_flashdata('msg_class', 'alert alert-success');
                    $this->session->set_flashdata('msg', lang('update_success_message'));
                }
                else {
                    $this->session->set_flashdata('msg_class', 'alert alert-success');
                    $this->session->set_flashdata('msg', lang('update_error_message'));
                }
            }
            redirect('admin/contactUs/form', 'location');
        }
    }
}