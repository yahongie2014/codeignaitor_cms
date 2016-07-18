<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends Front_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('feedback_model');
        $this->load->model('contactus_model');
        $this->Data['menu_contact'] = true;
    }

    function index() {
        $this->Data['title'] = lang('front_feedback');
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'feedbackContent'), $this->GetLang);

        //show form and insert
        $this->form_validation->set_rules('name', lang('front_name'), 'trim|required');
        $this->form_validation->set_rules('email', lang('front_email'), 'trim|required|valid_email');
        $this->form_validation->set_rules('tel', lang('front_phone'), 'trim');
        $this->form_validation->set_rules('message', lang('front_message'), 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            $this->load->view('front/header', $this->Data);
            $this->load->view( 'front/feedback', $data);
            $this->load->view('front/footer', $this->Data);
        } else {
            $postedArray = $this->input->post(NULL, TRUE);
            $dbData['name'] = $postedArray['name'];
            $dbData['tel'] = $postedArray['tel'];
            $dbData['email'] = $postedArray['email'];
            $dbData['message'] = $postedArray['message'];
            $dbData['date'] = date('Y-m-d H:i:s');
            if ($this->feedback_model->insertContact($dbData)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" >'.lang('contact_thanks').'</div>');
            
                    $data['contactInfo'] = $this->contactus_model->getContactInfo(1);                    

                    //load email helper
                    $this->load->helper('email');
                    $this->load->library('email');

                    $email_setting = array();
                    $email_setting['useragent']           = "CodeIgniter";
                    $email_setting['mailpath']            = "/usr/sbin/sendmail";
                    $email_setting['protocol']            = "mail";
                    $email_setting['mailtype'] = 'html';
                    $email_setting['charset']  = 'utf-8';
                    $email_setting['newline']  = "\r\n";
                    $email_setting['validate'] = TRUE;
                    $email_setting['wordwrap'] = TRUE;
                    $this->email->initialize($email_setting);

                    $this->email->from('info@mig-academy.com', 'MIG Academy Website');
                   
                    
              
                     
                    $this->email->to($data['contactInfo']->email);

                    $this->email->subject('New Feedback in your website | MIG Academy Website');
                    $this->email->message('<html>
                               
                    <body>
                        <table>
                        
                            <tbody>
                                <tr>
                                    <td><h4>Name</h4></td>
                                    <td>'.$dbData['name'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Email</h4></td>
                                    <td>'.$dbData['email'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Phone Number</h4></td>
                                    <td>'.$dbData['tel'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Message</h4></td>
                                    <td>'.$dbData['message'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Date</h4></td>
                                    <td>'.$dbData['date'].'</td>
                                </tr>
                                 <tr>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td>This is an automated email sent from MIG Academy Website.</td>
                                </tr>
                            </tbody>
                        </table>
                    </body>
                    </html>');

                    $this->email->send();
                    // echo $this->email->print_debugger();
                
                
                
                
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" >'.lang('front_insert_error').'</div>');
            }
            redirect('feedback', 'location');
        }
    }
}