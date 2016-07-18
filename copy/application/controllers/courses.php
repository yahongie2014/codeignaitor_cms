<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('course_model');
        $this->load->model('category_model');
        $this->load->model('instructor_model');
        $this->load->model('course_instructor_model');
        $this->load->model('trainee_model');
        $this->load->model('application_model');
        $this->Data['menu_courses'] = true;
    }

    public function index() {
        $this->Data['title'] = lang('courses');
        $courses = array();
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'coursesContent'), $this->GetLang);
        $data['categories'] = $this->category_model->getWithLanguage(array('categories.isActive' => 1), $this->GetLang);
        $courses = $this->course_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
        $data['courses'] =  $courses;
        $this->load->view('front/header', $this->Data);
        $this->load->view('front/courses/show', $data);
        $this->load->view('front/footer', $this->Data);
    }

    public function view(){

        $id = $this->uri->segment(2);
        if(!empty($id)){

            $categoryName = '';
            $course = $this->course_model->getWithLanguage($id, $this->GetLang);
            if(!empty($course)) {
                $courseId = $course->id;

                $course->instructors = $this->course_instructor_model->getWithLanguageExtend(array('courseId' => $courseId), $this->GetLang);
                //Related courses
                $data['relatedCourses'] = $this->course_model->getRelated(array('categoryId' => $course->categoryId), $id, $this->GetLang);
            }
            $data['course'] =  $course;

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

            //page general content
            $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'coursesContent'), $this->GetLang);
            $this->load->view('front/header', $this->Data);
            $this->load->view('front/courses/single', $data);
            $this->load->view('front/footer', $this->Data);

        }else{
            redirect(base_url().'courses');
        }
    }

    function apply() {
        $response['message'] = '';
        $response['errors'] = '';
        $response['status'] = '';
        $courseId = $this->uri->segment(3);
        $formType = $this->uri->segment(4);
        if(!empty($courseId)) {

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
                    $traineeData = $this->trainee_model->getRowExtend(array('phone' => $postedArray['phone'], 'courseId' => $courseId));
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
                    $applicationData['courseId'] = $courseId;
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
/* End of file courses.php */
/* Location: ./application/controllers/courses.php */