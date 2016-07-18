<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletter extends MY_Controller {

    function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->model('newsletter_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_website'] = true;
        $this->data['admin_menu_newsletter'] = true;

        //permissions
        if ($this->admin_ion_auth->in_group(array('secretary'))) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }
    }

    //Show emails
    public function index() {

        $this->data['page_title'] = lang( 'newsletter' );
        //get newsletter
        $data['newsletter'] = $this->newsletter_model->showAllNewsletter();
        $this->load->vars($data);
        $this->render('admin/newsletter/show');
    }

    public function emails() {
        $this->data['page_title'] = lang( 'show_emails' );
        //get emails
        $emails = '';
        $returnedData = $this->newsletter_model->getEmails();
        if(!empty($returnedData)){
            foreach ($returnedData as $e) {
                $emails .= $e->email.',<br/>';
            }
        }
        $data['emails'] = $emails;
        $this->load->vars($data);
        $this->render('admin/newsletter/emails');
    }


    function delete()
    {
        $id = (int) $this->uri->segment(4);
        if (isset($id)) {
            //delete news
            $this->newsletter_model->delete_newsletter($id);
        }
        redirect('admin/newsletter', 'location');
    }

    function deleteMultiple()
    {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {

            foreach ($choosedItemArr as $id) {
                //delete news
                $this->newsletter_model->delete_newsletter($id);
            }
        }
        redirect('admin/newsletter', 'location');
    }
}