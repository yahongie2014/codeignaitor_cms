<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('course_model');
        $this->load->model('category_model');
        $this->load->model('branches_model');
        $this->load->model('instructor_model');
        $this->load->model('course_instructor_model');
        $this->load->model('branches_course_model');
        $this->load->model('trainee_model');
        $this->load->model('application_model');
        $this->load->model('contactus_model');
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
                //branshes course
                $data['branches'] = $this->branches_course_model->getWithLanguageExtend(array('courseId' => $courseId), $this->GetLang);
                
            }
//                $data['branches'] =  $branches;
                if(!empty($data['branches'])) {
                      foreach ($data['branches'] as $branche) {
                    $branche->start = $this->date_arabic($branche->start);
                }
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
                unset($_POST['branchesId']) ;               
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
                $newData['branchesId'] = $postedArray['branchesId'];
                if(!empty($traineeData)) { //update
                    if(!empty($traineeData->id)) {
                        $traineeId = $this->trainee_model->update($newData, $traineeData->id);
                    }
                } else { //insert
                    $newData['addingDate'] = date("Y-m-d H:i:s");
                    $traineeId = $this->trainee_model->insert($newData);

                    $id = $this->uri->segment(2);
                    $course = $this->course_model->getWithLanguage($id, $this->GetLang);
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

                    $this->email->subject('New cheakout| MIG Academy Website');
                    $this->email->message('<html>
                               
                    <body>
                        <table>
                        
                            <tbody>
                                <tr>
                                    <td><h4>Name</h4></td>
                                    <td>'.$newData['name'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Email</h4></td>
                                    <td>'.$newData['email'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Phone Number</h4></td>
                                    <td>'.$newData['phone'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>College Work</h4></td>
                                    <td>'.$newData['college_work'].'</td>
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
                
                    
                }

                if (!empty($traineeId)) {
                    //insert application
                    $applicationData['traineeId'] = $traineeId;
                    $applicationData['courseId'] = $courseId;
                    $applicationData['branchesId'] = $postedArray['branchesId'];
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
                          
            }
        }
        else // Just redirect to the root URL
        {
            $this->load->helper('url');
            redirect('courses', 'refresh');
        }
    }
    
        //print date arabic
    public function date_arabic($t) {
        $timestamp = strtotime($t);
        $months = array("Jan" => "يناير","Feb" => "فبراير","Mar" => "مارس","Apr" => "أبريل","May" => "مايو","Jun" => "يونيو","Jul" => "يوليو","Aug" => "أغسطس","Sep" => "سبتمبر","Oct" => "أكتوبر","Nov" => "نوفمبر","Dec" => "ديسمبر");
        $en_month = date("M", $timestamp);
        foreach ($months as $en => $ar) {
            if ($en == $en_month) {
                $ar_month = $ar;
            }
        }
        $find = array("Sat","Sun","Mon","Tue","Wed","Thu","Fri");
        $replace = array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
        $ar_day_format = date('D', $timestamp); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);
        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
        $current_date = $ar_day . ' ' . date('d', $timestamp) . '  ' . $ar_month . '  ' . date('Y', $timestamp);
        $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);
        return $arabic_date;
    }
    
        //print time arabic
    public function time_arabic($t) {
       $timestamp = strtotime($t);
       $time = date("H",$timestamp);
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        $timeformat= date('g:i',strtotime($t));

        if ($time < "12") {
            return $timeformat ." صباحاً";
        } elseif($time >= "12"){
         return $timeformat ." مساءاً";
        }
        }
        
}
/* End of file courses.php */
/* Location: ./application/controllers/courses.php */