<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('package_model');
        $this->load->model('package_course_model');
        $this->load->model('instructor_model');
        $this->load->model('package_instructor_model');
        $this->load->model('application_model');
        $this->load->model('trainee_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_website'] = true;
        $this->data['admin_menu_packages'] = true;
    }

    public function index() {
        $this->data['page_title'] = lang('packages');
        $returnedData = $this->package_model->getWithLanguage(NULL, $this->GetLang);
        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                //get applications number
                $item->applications = $this->application_model->get(array('packageId' => $item->id));
            }
        }
        $data['returnedData'] = $returnedData;
        $this->load->vars($data);
        $this->render('admin/packages/show');
    }

    /**
     * add, edit forms for packages
     */
    public function form() {
        $this->data['page_title'] = lang('packages');
        $data['returnedData'] = '';
        $data['packageInstructors'] = '';
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->package_model->get($id);
            if (!empty($returnedData)) {
                $instructorsARR = $this->instructor_model->getPackageInstructors(array('packageId' => $id));
                $instructors = '';
                if(!empty($instructorsARR)){
                    foreach ($instructorsARR as $value) {
                        if(!empty($value->id)){
                            $instructors[] = $value->id;
                        }
                    }
                }
                $data['packageInstructors'] = $instructors;
            }
            $data['returnedData'] = $returnedData;
        }

        //instructors
        $data['instructors'] = $this->instructor_model->getNames(NULL, $this->GetLang);

        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'desc200AR', 'label' => lang('desc200AR'), 'rules' => 'trim|max_length[200]'),
            array('field' => 'desc200GE', 'label' => lang('desc200GE'), 'rules' => 'trim|max_length[200]'),
            array('field' => 'contentAR', 'label' => lang('package_content').' ('.lang('arabic').')', 'rules' => 'trim'),
            array('field' => 'contentGE', 'label' => lang('package_content').' ('.lang('german').')', 'rules' => 'trim'),
            array('field' => 'price', 'label' => lang('price'), 'rules' => 'trim|required'),
            array('field' => 'durationAR', 'label' => lang('duration'). ' ('.lang('arabic').')', 'rules' => 'trim|required'),
            array('field' => 'weeksNumAR', 'label' => lang('weeksNum'). ' ('.lang('arabic').')', 'rules' => 'trim'),
            array('field' => 'lecturesNumAR', 'label' => lang('lecturesNum'). ' ('.lang('arabic').')', 'rules' => 'trim'),
            array('field' => 'durationGE', 'label' => lang('duration'). ' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'weeksNumGE', 'label' => lang('weeksNum'). ' ('.lang('german').')', 'rules' => 'trim'),
            array('field' => 'lecturesNumGE', 'label' => lang('lecturesNum'). ' ('.lang('german').')', 'rules' => 'trim'),
            array('field' => 'isActive', 'label' => lang('isActive'), 'rules' => 'required'),
            array('field' => 'instructorId[]', 'label' => lang('instructors'), 'rules' => 'required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                $instructorsARR = $postedArray['instructorId'];

                //delete instructorId from array because it is not in the packages table
                unset($postedArray['instructorId']);

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");
                    //instructors
                    if(!empty($instructorsARR)) {
                        //delete old
                        $this->package_instructor_model->delete(array('packageId' => $id));
                        foreach($instructorsARR as $key => $value){
                            //insert again
                            $instructorData['instructorId'] = $value;
                            $instructorData['packageId'] = $id;
                            $this->package_instructor_model->insert($instructorData);
                        }
                    }


                    //upload image
                    $config['upload_path'] = './application/views/images/upload/packages/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '10000';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!empty($_FILES['image']['name'])) {
                        if ($this->upload->do_upload("image")) {
                            //get new image name
                            $uploaded_image = $this->upload->file_name;
                            $postedArray['image'] = $uploaded_image;
                            if(!empty($returnedData)){
                                //delete old image
                                $file = $config['upload_path'].$returnedData->image;
                                @unlink($file);
                            }
                        } else {
                            $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".lang('insert_error').' '.$this->upload->display_errors()."</div>");
                            redirect('admin/packages/form/' . $id, 'location');
                        }
                    }

                    //empty image validation errors if there are any.
                    $this->session->set_flashdata('image_msg', "");

                    if ($this->package_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/packages/packageData/'.$id, 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/packages/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->package_model->insert($postedArray);
                    if (!empty($id)) {
                        //instructors
                        if(!empty($instructorsARR)) {
                            foreach($instructorsARR as $key => $value){
                                $instructorData['instructorId'] = $value;
                                $instructorData['packageId'] = $id;
                                $this->package_instructor_model->insert($instructorData);
                            }
                        }
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/packages/packageData/'.$id , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/packages/form');
    }

    /**
     * Show courses, instructors in one page
     */
    public function packageData() {
        $this->data['page_title'] = lang('packageData');
        $data = array();
        $packageId = $this->uri->segment(4);
        if(!empty($packageId)) {
            $data['packageId'] = $packageId;

            $courses = $this->package_course_model->getWithLanguage(array('packageId' => $packageId), $this->GetLang);
            if(!empty($courses)) {
                foreach ($courses as $course) {
                    $course->username = $this->admin_ion_auth->user($course->userId)->row()->username;
                }
            }
            $data['courses'] = $courses;
        }

        $this->load->vars($data);
        $this->render('admin/packages/packageData');
    }

    /**
     * add, edit forms for courses
     */
    public function course() {
        $this->data['page_title'] = lang('courses');
        $data['returnedData'] = '';

        $packageId = (int) $this->uri->segment(4);
        if(!empty($packageId)) {
            $data['packageId'] = $packageId;
            $id = (int) $this->uri->segment(5);
            if (!empty($id)) {
                $returnedData = $this->package_course_model->get($id);
                $data['returnedData'] = $returnedData;
            }

            $validation_rules = array(
                array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
                array('field' => 'titleGE', 'label' => lang('title').' ('.lang('german').')', 'rules' => 'trim|required')
            );
            $this->form_validation->set_rules($validation_rules);

            if ($this->form_validation->run() == false) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
                //set the flash data error message if there is one
                $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('msg'));
            }else {
                if($_POST) {
                    $postedArray = $this->input->post( NULL, TRUE );
                    $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;
                    $postedArray['packageId'] = $packageId;

                    if (!empty($id)) { //update
                        $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                        if ($this->package_course_model->update($postedArray, $id)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                            redirect('admin/packages/packageData/'.$packageId , 'location');
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                            redirect('admin/packages/course/'.$packageId.'/'. $id, 'location');
                        }
                    }//end id
                    else{//insert
                        $postedArray['addingDate'] = date("Y-m-d H:i:s");

                        if ($this->package_course_model->insert($postedArray)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                        }
                        redirect('admin/packages/packageData/'.$packageId , 'location');
                    }
                }//post
            }//else
            $this->load->vars($data);
            $this->render('admin/packages/course');
        } else {
            redirect('admin/packages', 'location');
        }
    }

    function delete()
    {
        $id = (int) $this->uri->segment(4);
        $type = $this->uri->segment(5);
        $packageId = (int) $this->uri->segment(6);
        if (!empty($id)) {
            if(!empty($type) && !empty($packageId)) {
                if($type == 'course') {
                    $this->package_course_model->delete($id);
                }
                redirect('admin/packages/packageData/'.$packageId, 'location');
            } else {
                //delete package
                $this->package_model->delete($id);
                $this->package_course_model->delete(array('packageId' => $id));
                $this->package_instructor_model->delete(array('packageId' => $id));

                $applicationData = $this->application_model->get(array('packageId' => $id));
                $courseName = '';
                $traineeName = '';
                if (!empty($applicationData)) {
                    foreach ($applicationData as $application) {
                        //get course name for financial reports
                        if(!empty($application->packageId)) {
                            $courseData = $this->package_model->get($application->packageId);
                            if (!empty($courseData)) {
                                $courseName = $courseData->titleGE;
                            }
                        }

                        //get traineeName for financial reports
                        $traineeData = $this->trainee_model->get($application->traineeId);
                        if (!empty($traineeData)) {
                            $traineeName = $traineeData->name;
                        }
                    }

                    $this->application_model->delete(array('packageId' => $id));
                }

                redirect('admin/packages', 'location');
            }
        }
    }

    public function applications() {
        $data['courseName'] = '';
        $packageId = $this->uri->segment(4);
        if(!empty($packageId)) {
            $this->data['page_title'] = lang('applications');
            $returnedData = $this->application_model->getPackagesApplications(array('packageId' => $packageId));
            if(!empty($returnedData)){
                foreach ($returnedData as $item) {
                    $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;

                    if (!empty($item->packageId)) {
                        $packageData = $this->package_model->getWithLanguage($item->packageId, $this->GetLang);
                        if(!empty($packageData)) {
                            $item->packageName = $packageData->title;
                            $data['courseName'] = $item->packageName;
                        }
                    }
                }
            }
            $data['returnedData'] = $returnedData;

            $this->load->vars($data);
            $this->render('admin/packages/applications');
        } else {
            redirect('admin/packages', 'location');
        }

    }

    function deleteApplication()
    {         //delete one row
        //permissions
        $groups = array('admin');
        if (!$this->admin_ion_auth->in_group($groups)) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $id = (int) $this->uri->segment(4);
        $traineeId = (int) $this->uri->segment(5);
        $packageId = (int) $this->uri->segment(6);
        if (!empty($id) && !empty($traineeId) && !empty($packageId)) {

            $application = $this->application_model->get($id);

            if (!empty($application)) {

                //get course name for financial reports
                if(!empty($application->packageId)) {
                    $courseData = $this->package_model->get($application->packageId);
                }

                if (!empty($courseData)) {
                    $courseName = $courseData->titleGE;
                }

                //get traineeName for financial reports
                $traineeData = $this->trainee_model->get($traineeId);
                if (!empty($traineeData)) {
                    $traineeName = $traineeData->name;
                }

                $this->application_model->delete($id);
            }
            redirect('admin/packages/applications/'.$packageId, 'location');
        } else {
            redirect('admin/packages', 'location');
        }
    }
}