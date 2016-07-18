<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('feedback_model');
        $this->load->model('contactus_model');
        $this->load->model('course_model');
        $this->load->model('trainee_model');
        $this->load->model('category_model');
        $this->load->model('application_model');
        $this->data['css'] = $this->Style_Sheet;
    }

    public function index() {
       
        $this->data['page_title'] = lang('home');

        //get contact us messages
        $data['contactMessages'] = $this->contactus_model->showAllMessages();
        //get feedback messages
        $data['feedbackMessages'] = $this->feedback_model->showAllMessages();

        //latest (paypal)
        $data['latestStudents'] = $this->latestRegisteredStudents();

        //Pending Course Registeration (book and pay later)
        $data['pendingApplications'] = $this->pendingApplications();

        $this->load->vars($data);
        $this->render('admin/home');
    }

    public function latestRegisteredStudents()
    {
        $this->load->model('package_model');

        $latestStudents = array();
        $students = $this->trainee_model->getDesc(array('adminId' => 0)); //self registered student
        if (!empty($students)) {
            foreach ($students as $student) {
                $student->registrationDate = $student->addingDate;
                ///////////////////////////applications
                $applications = $this->application_model->get(array('traineeId' => $student->id));
                if(!empty($applications) && !empty($applications[0])) { //get first row only
                    $item = $applications[0];
                    $student->type = $item->type;
                    if (!empty($item->courseId)) {
                        $courseData = $this->course_model->getWithLanguage($item->courseId, $this->GetLang);
                        if(!empty($courseData)) {
                            $student->courseName = $courseData->title;
                        }
                    } else if (!empty($item->packageId)) {
                        $packageData = $this->package_model->getWithLanguage($item->packageId, $this->GetLang);
                        if(!empty($packageData)) {
                            $student->courseName = $packageData->title;
                        }
                    }
                }
            }
        }
        return $students;
    }

    public function pendingApplications()
    {
        $this->load->model('package_model');

        $students = $this->trainee_model->getPendingApplications();
        if (!empty($students)) {
            foreach ($students as $student) {
                $student->registrationDate = $student->addingDate;

                if (!empty($student->courseId)) {
                    $courseData = $this->course_model->getWithLanguage($student->courseId, $this->GetLang);
                    if(!empty($courseData)) {
                        $student->courseName = $courseData->title;
                    }

                }
                elseif (!empty($student->packageId)) {

                    if (!empty($student->packageId)) {
                        $packageData = $this->package_model->getWithLanguage($student->packageId, $this->GetLang);
                        if(!empty($packageData)) {
                            $student->courseName = $packageData->title;
                        }
                    }
                }
            }
        }
        return $students;
    }

    public function set_lang() {/////set langauge
        $Lang = $this->uri->segment(4);
        if ( $Lang == 'german' || $Lang == 'arabic' ) {
            $this->session->set_userdata( 'language', $Lang );
            $PageUrl = $_SERVER['HTTP_REFERER'];
            redirect( $PageUrl );
        }
    }
}

/* End of file index.php */
/* Location: ./application/controllers/admin/index.php */