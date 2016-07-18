<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trainees extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('trainee_model');
        $this->load->model('course_model');
        $this->load->model('package_model');
        $this->load->model('application_model');
        $this->load->model('category_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_trainees'] = true;
    }

    public function index() {
        $this->data['page_title'] = lang('trainees');
        $returnedData = $this->trainee_model->get();
        if(!empty($returnedData)) {
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->adminId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/trainees/show');
    }

    /**
     * add, edit forms for trainees
     */
    public function form() {
        $this->data['page_title'] = lang('trainees');
        $data['returnedData'] = '';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->trainee_model->get($id);
            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'name', 'label' => lang('Name'), 'rules' => 'trim|required'),
            array('field' => 'email', 'label' => lang('Email'), 'rules' => 'trim|required|valid_email'),
            array('field' => 'college_work', 'label' => lang( 'college_work' ), 'rules' => 'trim|required' ),
        );
        $this->form_validation->set_rules($validation_rules);

        if(!empty($returnedData)) {
            $this->session->set_userdata( 'traineeId', $id ); //save current is into session
            $this->form_validation->set_rules('phone', lang('Phone'), 'trim|required|callback_check_phone_edit');
        } else {
            $this->form_validation->set_rules('phone', lang('Phone'), 'trim|required|callback_check_phone');
        }

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        } else {
            if($_POST) {

                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['adminId'] = $this->admin_ion_auth->user()->row()->id;

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->trainee_model->update($postedArray, $id)) {

                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        //redirect('admin/trainees', 'location');
                        redirect('admin/trainees/applications/'.$id, 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/trainees/form/' . $id, 'location');
                    }
                }//end id
                else {//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->trainee_model->insert($postedArray);
                    if (!empty($id)) {

                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        redirect('admin/trainees/applications/'.$id, 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/trainees' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/trainees/form');
    }

    public function applications() {
        $data = array();
        $traineeId = $this->uri->segment(4);
        if(!empty($traineeId)) {
            $data['traineeId']  = $traineeId;
            $this->data['page_title'] = lang('applications');

            //get trainee name
            $traineeData = $this->trainee_model->get($traineeId);
            if (!empty($traineeData)) {
                $data['traineeName'] = $traineeData->name;
            }

            ///////////////////////////courses
            $coursesApplications = $this->application_model->getCoursesApplications(array('traineeId' => $traineeId));
            if(!empty($coursesApplications)) {
                foreach ($coursesApplications as $item) {
                    $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;

                    if (!empty($item->courseId)) {
                        $courseData = $this->course_model->getWithLanguage($item->courseId, $this->GetLang);
                        if(!empty($courseData)) {
                            $item->courseName = $courseData->title;
                            //get category name
                            if(!empty($courseData->categoryId)) {
                                $categoryData = $this->category_model->getWithLanguage($courseData->categoryId, $this->GetLang);
                            }
                        }
                    }
                }
            }
            $data['coursesApplications'] = $coursesApplications;

            /////////////////////packages
            $packagesApplications = $this->application_model->getPackagesApplications(array('traineeId' => $traineeId));

            if(!empty($packagesApplications)) {
                foreach ($packagesApplications as $item) {
                    $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;

                    if (!empty($item->packageId)) {
                        $packageData = $this->package_model->getWithLanguage($item->packageId, $this->GetLang);
                        if(!empty($packageData)) {
                            $item->courseName = $packageData->title;
                        }
                    }
                }
            }
            $data['packagesApplications'] = $packagesApplications;

            $this->load->vars($data);
            $this->render('admin/trainees/applications');
        } else {
            redirect('admin/trainees', 'location');
        }

    }

    /**
     * assign trainee to course or package
     */
    public function assign() {
        $this->data['page_title'] = lang('trainees');
        $data['returnedData'] = '';
        $data['traineeId'] = 0;

        $id =  $this->uri->segment(4); //application id
        $traineeId = (int) $this->uri->segment(5);
        $type = $this->uri->segment(6);
        $data['type'] = $type;

        if (!empty($traineeId)) {
            $data['traineeId'] = $traineeId;
        } //traineeId
        else {
            //get trainees
            $data['trainees'] = $this->trainee_model->get();

            $this->data['page_title'] = lang('application');
            $this->data['admin_menu_trainees'] = false;
            $this->data['admin_menu_application'] = true;
        }

        //if this is an edit form, id will not be empty.
        if (!empty($id)) {

            $returnedData = $this->application_model->get($id);
            if (!empty($returnedData)) {
                //category id
                if (!empty($returnedData->courseId)) {
                    $courseData = $this->course_model->get($returnedData->courseId);
                    if(!empty($courseData)) {
                        $returnedData->categoryId = $courseData->categoryId;
                    }
                }
            }
            $data['returnedData'] = $returnedData;
        }

        if (!empty($type) && $type == "package") {
            $this->data['admin_menu_packages_application'] = true;
            $data['packages'] = $this->package_model->getWithLanguage(NULL, $this->GetLang);
        } else {

            $this->data['admin_menu_courses_application'] = true;
        }
        $data['categories'] = $this->category_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
        $this->load->vars($data);
        if (!empty($type) && $type == "course") {
            $this->render('admin/trainees/assign');
        } else {
            $this->render('admin/trainees/assignPackage');
        }
    }

    public function assignAjax() {

        $traineeName = '';
        $courseName = '';

        $response['message'] = '';
        $response['errors'] = '';
        $response['status'] = '';

        $id = (int) $this->uri->segment(4); //applicationId
        $traineeId = (int) $this->uri->segment(5);

        $validation_rules = array(
            array('field' => 'price', 'label' => lang('price'), 'rules' => 'trim|required'),
            array('field' => 'courseId', 'label' => lang('courses'), 'rules' => 'trim|required|check_default'),
            array('field' => 'categoryId', 'label' => lang('Category'), 'rules' => 'trim|check_default'),
            array('field' => 'status', 'label' => lang('status'), 'rules' => 'trim'),
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >', '</div>');
            $errors = array();
            // Loop through $_POST and get the keys
            foreach ($this->input->post() as $key => $value) {
                // Add the error message for this field
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = FALSE;
        } else {
            if($_POST) {

                $postedArray = $this->input->post( NULL, TRUE );
                $dbData['userId'] = $this->admin_ion_auth->user()->row()->id;
                if (empty($traineeId)) {
                    $traineeId = $postedArray['traineeId'];
                }
                $dbData['traineeId'] = $traineeId;
                $dbData['price'] = $postedArray['price'];
                $dbData['status'] = $postedArray['status'];

                //get course name for financial reports
                if(!empty($postedArray['courseId'])) {
                    if(!empty($postedArray['type']) && $postedArray['type'] == 'package') {
                        $dbData['packageId'] = $postedArray['courseId'];
                    } else {
                        $dbData['courseId'] = $postedArray['courseId'];
                    }
                }

                if (!empty($id)) { //update
                    $dbData['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->application_model->update($dbData, $id)) {

                        $response['message'] = '<div class="alert alert-success" >'.lang('update_success_message').'</div>';
                        $response['status'] = TRUE;
                    } else {
                        $response['message'] = '<div class="alert alert-danger" >'.lang('update_error').'</div>';
                        $response['status'] = FLASE;
                    }
                }//end id
                else {//insert
                    $dbData['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->application_model->insert($dbData);
                    if (!empty($id)) {

                        $response['message'] = '<div class="alert alert-success" >'.lang('insert_success_message').'</div>';
                        $response['status'] = TRUE;
                    } else {
                        $response['message'] = '<div class="alert alert-danger" >'.lang('insert_error').'</div>';
                        $response['status'] = FLASE;
                    }
                }
            }//post
        }//else

        header('Content-type: application/json');
        exit(json_encode($response));
    }


    /**
     * add trainee and return AJAX
     */
    public function addAjax() {

        $validation_rules = array(
            array('field' => 'name', 'label' => lang('Name'), 'rules' => 'trim|required'),
            array('field' => 'phone', 'label' => lang('Phone'), 'rules' => 'trim|required|callback_check_phone'),
            array('field' => 'email', 'label' => lang('Email'), 'rules' => 'trim|required|valid_email'),
            array('field' => 'college_work', 'label' => lang( 'college_work' ), 'rules' => 'trim|required' ),
        );
        $this->form_validation->set_rules($validation_rules);

        $response['trainees'] = '';
        $response['id'] = '';
        $response['message'] = '';
        $response['errors'] = '';
        $response['status'] = '';

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >', '</div>');
            $errors = array();
            // Loop through $_POST and get the keys
            foreach ($this->input->post() as $key => $value) {
                // Add the error message for this field
                $errors[$key] = form_error($key);
            }
            $response['errors'] = array_filter($errors); // Some might be empty
            $response['status'] = FALSE;
        } else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['adminId'] = $this->admin_ion_auth->user()->row()->id;
                $postedArray['addingDate'] = date("Y-m-d H:i:s");

                $id = $this->trainee_model->insert($postedArray);
                if (!empty($id)) {
                    $trainees = $this->trainee_model->getArray();
                    //repopulate trainees with the new one
                    $response['trainees'] = $trainees;
                    $response['id'] = $id;
                    $response['status'] = TRUE;
                } else {
                    $response['message'] = lang('insert_error');
                    $response['status'] = FALSE;
                }
            }//post
        }//else

        header('Content-type: application/json');
        exit(json_encode($response));
    }
    /**
     * Get courses or packages
     */
    function getTraineeCourses() {
        header('Content-Type: application/x-json; charset=utf-8');
        $data = array();
        $courses = array();
        $traineeId = $this->uri->segment(4);
        if(!empty($traineeId)) {

            ///////////////////////////courses
            $coursesApplications = $this->application_model->getCoursesApplications(array('traineeId' => $traineeId));
            if(!empty($coursesApplications)) {
                foreach ($coursesApplications as $item) {
                    if (!empty($item->courseId)) {
                        $courseData = $this->course_model->getWithLanguage($item->courseId, $this->GetLang);
                        if(!empty($courseData)) {

                            $item->courseName = $courseData->title;
                        }
                    }

                    $data[$item->applicationsId] = $item->courseName; //prepare it for JSON
                }
            }
            /////////////////////packages
            $packagesApplications = $this->application_model->getPackagesApplications(array('traineeId' => $traineeId));

            if(!empty($packagesApplications)) {

                foreach ($packagesApplications as $item) {

                    if (!empty($item->packageId)) {
                        $packageData = $this->package_model->getWithLanguage($item->packageId, $this->GetLang);
                        if(!empty($packageData)) {
                            $item->courseName = $packageData->title;
                        }
                    }
                    $data[$item->applicationsId] = $item->courseName; //prepare it for JSON

                }
            }

        }

        echo(json_encode($data));
    }

    /**
     * Get application data
     */
    function getApplicationData() {
        header('Content-Type: application/x-json; charset=utf-8');
        $data = array();
        $price = 0;
        $applicationId = $this->uri->segment(4);
        if(!empty($applicationId)) {

            $applicationData = $this->application_model->get($applicationId);
            if(!empty($applicationData)) {
                $price = $applicationData->price;
            }
        }
        echo(json_encode(array($price)));
    }

    /**
     * Get courses or packages
     */
    function get_courses($courseType) {
        header('Content-Type: application/x-json; charset=utf-8');
        $data = array();
        $courses = array();

        $categoryId = $this->uri->segment(4);

        if(!empty($categoryId)) {
            $courses = $this->course_model->getWithLanguage(array('categoryId' => $categoryId, 'courses.isActive' => 1), $this->GetLang);
        } else {
            $courses = $this->package_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
        }

        if(!empty($courses)) {
            foreach ($courses as $item) {
                $data[$item->id] = $item->title; //prepare it for JSON
            }
        }
        echo(json_encode($data));
    }

    /**
     * Get dates in courses or packages
     */
    function get_course_data() {
        header('Content-Type: application/x-json; charset=utf-8');
        $price = 0;

        $courseId = $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if(!empty($courseId) && !empty($type)) {
            if($type == 'course') {
                //get price
                $courseData = $this->course_model->get($courseId);
                if (!empty($courseData)) {
                    $price = $courseData->price;
                }
            } elseif($type == 'package') {
                //get price
                $packageData = $this->package_model->get($courseId);
                if (!empty($packageData)) {
                    $price = $packageData->price;
                }
            }
        }
        echo(json_encode(array($price)));
    }

    function delete()
    {
        $courseData = array();
        $courseName = '';

        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                if (!empty($id)) {
                    //delete trainee
                    $this->trainee_model->delete($id);
                    $this->application_model->delete(array('traineeId' => $id));
                }
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                //delete trainee
                $this->trainee_model->delete($id);
                $this->application_model->delete(array('traineeId' => $id));
            }
        }
        redirect('admin/trainees', 'location');
    }

    function deleteApplication()
    {         //delete one row
        $id = (int) $this->uri->segment(4);
        $traineeId = (int) $this->uri->segment(5);
        if (!empty($id) && !empty($traineeId)) {
            $this->application_model->delete($id);
            redirect('admin/trainees/applications/'.$traineeId, 'location');
        } else {
            redirect('admin/trainees', 'location');
        }
    }

    //status
    public function status()
    {
        $id = $this->uri->segment(4);
        if ( !empty( $id )) {
            $data = $this->application_model->get($id);
            if(!empty($data)) {
                if($data->status == '1') { //already passed
                    $updatedData['status'] = '0';
                }
                else { //unapproved, approve it
                    $updatedData['status'] = '1';
                }
                $this->application_model->update($updatedData, $id);
            }
        }

        if (isset($_SERVER['HTTP_REFERER'])) {
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect('admin/trainees', 'location');
        }
    }

    public function check_phone($phone) {

        $is_exist = $this->trainee_model->get(array('phone' => $phone));
        if ($is_exist) {
            $this->form_validation->set_message(
                    'check_phone', lang('phone_used_message')
            );
            return false;
        } else {
            return true;
        }
    }

    public function check_phone_edit($phone) {
        $traineeId = $this->session->userdata('traineeId');

        $unit = $this->trainee_model->get($traineeId);

        $is_exist = $this->trainee_model->get(array('phone' => $phone));

        if ($is_exist) {

            $this->form_validation->set_message(
                    'check_phone_edit', lang('phone_used_message')
            );

            if (!empty($unit) && $phone == $unit->phone) {
                return true;
            } else {

                return false;
            }
        } else {

            return true;
        }
    }
}