<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feedback extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('feedback_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_feedback'] = true;
        $this->data['admin_menu_feedback_show'] = true;
        $this->data['page_title'] = lang( 'feedback' );
    }

    //Show emails
    public function index() {
        $this->data['page_title'] = lang('feedback');
        //get message
        $data['messages'] = $this->feedback_model->showAllMessages();
        $this->load->vars($data);
        $this->render('admin/feedback/show');
    }

    public function single() {
        $ID = $this->uri->segment(4);
        if(!empty($ID)) {
            //get message
            $data['contactMessage'] = $this->feedback_model->geById($ID);
        }
        $this->load->vars($data);
        $this->render('admin/feedback/viewSingle');
    }

    function delete() {
        $ID = (int) $this->uri->segment(4);
        if (!empty($ID)) {
            //delete row
            $this->feedback_model->delete($ID);
        }
        redirect('admin/feedback', 'location');
    }

    function deleteMultiple() {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {
            foreach ($choosedItemArr as $ID) {
                //delete
                $this->feedback_model->delete($ID);
            }
        }
        redirect('admin/feedback', 'location');
    }
}