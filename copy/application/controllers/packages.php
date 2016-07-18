<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Packages extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('package_model');
        $this->load->model('package_course_model');
        $this->load->model('instructor_model');
        $this->load->model('package_instructor_model');
        $this->load->model('application_model');
        $this->load->model('trainee_model');
        $this->Data['menu_packages'] = true;
    }

    public function index($id = 0) {
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'packagesContent'), $this->GetLang);
        $this->load->view('front/header', $this->Data);
        if(!empty($id)){
            $package = $this->package_model->getWithLanguage($id, $this->GetLang);
            if(!empty($package)) {
                $packageId = $package->id;
                $package->courses = $this->package_course_model->getWithLanguage(array('packageId' => $packageId), $this->GetLang);
                $package->instructors = $this->package_instructor_model->getWithLanguageExtend(array('packageId' => $packageId), $this->GetLang);
            }
            $data['package'] =  $package;

            //get paypal live url
            $this->config->load('paypal_ipn');
            $this->config->set_item('paypal_ipn_live_settings', array(
                'email' => $this->paypalEmail,
                'url' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
                'debug' => TRUE
            ));

            $values = $this->config->item('paypal_ipn_live_settings');

            $data['paypalUrl'] = '';
            if(!empty($values)) {
                $data['paypalUrl'] = $values['url'];
            }

            $this->load->view('front/packages/single', $data);
        } else {
            $packages = $this->package_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
            if(!empty($packages)) {
                foreach ($packages as $package) {
                    $packageId = $package->id;
                    $package->courses = $this->package_course_model->getWithLanguage(array('packageId' => $packageId), $this->GetLang);
                }
            }
            $data['packages'] =  $packages;
            $this->load->view('front/packages/show', $data);
        }

       $this->load->view('front/footer', $this->Data);
    }

    function apply() {
        $response['message'] = '';
        $response['errors'] = '';
        $response['status'] = '';
        $packageId = $this->uri->segment(3);
        $formType = $this->uri->segment(4);
        if(!empty($packageId)) {

            //show form and insert
            $validation_rules = array(
                array('field' => 'name', 'label' => lang('Name'), 'rules' => 'trim|required'),
                array('field' => 'phone', 'label' => lang('Phone'), 'rules' => 'trim|required'),
                array('field' => 'email', 'label' => lang('Email'), 'rules' => 'trim|required|valid_email'),
                array('field' => 'college_work', 'label' => lang( 'college_work' ), 'rules' => 'trim|required')
            );
            $this->form_validation->set_rules($validation_rules);

            if ($this->form_validation->run() == false) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
                $errors = array();
                // Loop through $_POST and get the keys
                foreach ($this->input->post() as $key => $value) {
                    // Add the error message for this field
                    $errors[$key] = form_error($key);
                }
                $response['errors'] = array_filter($errors); // Some might be empty
                $response['status'] = FALSE;
            } else {
                $postedArray = $this->input->post(NULL, TRUE);
                $traineeData = array();
                $traineeId = 0;
                //check if phone already exists, update, else insert trainee
                if(!empty($postedArray['phone'])) {
                    $traineeData = $this->trainee_model->getRowExtend(array('phone' => $postedArray['phone'], 'packageId' => $packageId));
                }

                $newData['name'] = $postedArray['name'];
                $newData['college_work'] = $postedArray['college_work'];
                $newData['email'] = $postedArray['email'];
                $newData['phone'] = $postedArray['phone'];
                if(!empty($traineeData)) { //update
                    if(!empty($traineeData->id)) {
                        $traineeId = $this->trainee_model->update($newData, $traineeData->id);
                    }
                } else { //insert
                    $newData['addingDate'] = date("Y-m-d H:i:s");
                    $traineeId = $this->trainee_model->insert($newData);
                }

                if (!empty($traineeId)) {
                    //insert application
                    $applicationData['traineeId'] = $traineeId;
                    $applicationData['packageId'] = $packageId;
                    if (!empty($formType) && $formType == "paypal") {
                        $applicationData['type'] = 1;
                        $applicationData['status'] = "normal";
                    } else {
                        $applicationData['status'] = "pending";
                    }
                    $applicationData['addingDate'] = date('Y-m-d');
                    $this->application_model->insert($applicationData);

                    $response['message'] = '<div class="alert alert-success" >'.lang('application_success').'</div>';
                    $response['status'] = TRUE;
                } else {
                    $response['message'] = '<div class="alert alert-danger" >'.lang('front_insert_error').'</div>';
                    $response['status'] = FALSE;
                }
            }
        }
        header('Content-type: application/json');
        exit(json_encode($response));
    }


    // To handle the IPN post made by PayPal (uses the Paypal_Lib library).
    function ipn()
    {
        $this->load->library('PayPal_IPN'); // Load the library
        // Try to get the IPN data.
        if ($this->paypal_ipn->validateIPN())
        {
            // Succeeded, now let's extract the order
            $this->paypal_ipn->extractOrder();
            // And we save the order now (persist and extract are separate because you might only want to persist the order in certain circumstances).
            $this->paypal_ipn->saveOrder();
            // Now let's check what the payment status is and act accordingly
            if ($this->paypal_ipn->orderStatus == PayPal_IPN::PAID)
            {
                /* HEALTH WARNING:
                 *
                 * Please note that this PAID block does nothing. In other words, this controller will not respond to a successful order
                 * with any notification such as email or similar. You will have to identify paid orders by checking your database.
                 */
            }
        }
        else // Just redirect to the root URL
        {
            $this->load->helper('url');
            redirect('courses', 'refresh');
        }
    }
}

/* End of file packages.php */
/* Location: ./application/controllers/packages.php */