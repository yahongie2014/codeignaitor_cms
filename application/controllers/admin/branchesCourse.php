<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BranchesCourse extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        $this->load->model('course_model');
        $this->load->model('branches_model');
        $this->load->model('instructor_model');
        $this->load->model('course_instructor_model');
        $this->load->model('course_branches_model');
        $this->load->model('application_model');
        $this->load->model('trainee_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_branches_courses'] = true;
        $this->session->keep_flashdata('image_msg');
    }

    public function index() {
        $this->data['page_title'] = lang('courses');
        $returnedData = $this->course_model->getWithLanguage(NULL, $this->GetLang);
        if (!empty($returnedData)) {
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                if (!empty($item->categoryId)) {
                    $categoryData = $this->category_model->getWithLanguage($item->categoryId, $this->GetLang);
                    if (!empty($categoryData)) {
                        $item->categoryName = $categoryData->title;
                    }
                }
                //get applications number
                $item->applications = $this->application_model->get(array('courseId' => $item->id));
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/branchesCourse/show');
    }

    /**
     * add, edit forms for courses
     */
    public function form() {
        $this->data['page_title'] = lang('courses');
        $data['returnedData'] = '';
        $data['courseInstructors'] = '';
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->course_model->get($id);
            if (!empty($returnedData)) {
                $categoryData = $this->category_model->get($returnedData->categoryId);
                if (!empty($categoryData)) {
                    $instructorsARR = $this->instructor_model->getExtend(array('courseId' => $id));
                    $instructors = '';
                    if (!empty($instructorsARR)) {
                        foreach ($instructorsARR as $value) {
                            if (!empty($value->id)) {
                                $instructors[] = $value->id;
                            }
                        }
                    }
                    $data['courseInstructors'] = $instructors;
                   
                }
            }
            if (!empty($returnedData)) {
                $data['coursebranches'] = $this->course_branches_model->getExtend($id);
                //$data['returnedData'] = $returnedData;
            }
            $data['branches'] = $this->branches_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
            $data['returnedData'] = $returnedData;
        }
        //instructors
        $data['instructors'] = $this->instructor_model->getNames(NULL, $this->GetLang);
        //get categories
        $data['categories'] = $this->category_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
        $i = 0;
        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title') . ' (' . lang('german') . ')', 'rules' => 'trim|required'),
            array('field' => 'desc200AR', 'label' => lang('desc200AR'), 'rules' => 'trim|max_length[200]'),
            array('field' => 'desc200GE', 'label' => lang('desc200GE'), 'rules' => 'trim|max_length[200]'),
            array('field' => 'contentAR', 'label' => lang('course_content') . ' (' . lang('arabic') . ')', 'rules' => 'trim'),
            array('field' => 'contentGE', 'label' => lang('course_content') . ' (' . lang('german') . ')', 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][branchesId]', 'label' => lang('Branches'), 'rules' => 'trim|required'),
            array('field' => 'price', 'label' => lang('price'), 'rules' => 'trim|required'),
            array('field' => 'duration', 'label' => lang('duration'), 'rules' => 'trim|required'),
            array('field' => 'branches[' . $i . '][price]', 'label' => lang('price'), 'rules' => 'trim|required'),
            array('field' => 'branches[' . $i . '][duration]', 'label' => lang('duration'), 'rules' => 'trim|required'),
            array('field' => 'branches[' . $i . '][weeksNum]', 'label' => lang('weeksNum'), 'rules' => 'trim|required'),
            array('field' => 'branches[' . $i . '][lecturesNum]', 'label' => lang('lecturesNum'), 'rules' => 'trim|required'),
            array('field' => 'branches[' . $i . '][start]', 'label' => lang('startTime'), 'rules' => 'trim|required'),
            array('field' => 'isActive', 'label' => lang('isActive'), 'rules' => 'required'),
            array('field' => 'instructorId[]', 'label' => lang('instructors'), 'rules' => 'required'),
            array('field' => 'categoryId', 'label' => lang('Category'), 'rules' => 'trim')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        } else {
            if ($_POST) {
                if (!empty($postedArray['start'])) {
                    // 12-hour time to 24-hour time
                    $time_in_24_hour_format = date("H:i", strtotime($postedArray['start']));
                    $postedArray['start'] = $time_in_24_hour_format;
                }
                $postedArray = $this->input->post(NULL, TRUE);
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                $instructorsARR = $postedArray['instructorId'];
                $branchesARR = $postedArray['branches'];
                //delete instructorId from array because it is not in the courses table
                unset($postedArray['instructorId']);
                unset($postedArray['branches']);

                //upload image
                $config['upload_path'] = './application/views/images/upload/courses/';
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
                        if (!empty($returnedData)) {
                            //delete old image
                            $file = $config['upload_path'] . $returnedData->image;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>" . lang('insert_error') . ' ' . $this->upload->display_errors() . "</div>");
                        redirect('admin/branchesCourse/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");


                    //instructors
                    if (!empty($instructorsARR)) {
                        //delete old
                        $this->course_instructor_model->delete(array('courseId' => $id));
                        foreach ($instructorsARR as $key => $value) {
                            //insert again
                            $instructorData['instructorId'] = $value;
                            $instructorData['courseId'] = $id;
                            $this->course_instructor_model->insert($instructorData);
                        }
                    }
                    if (!empty($branchesARR)) {
                        //delete old
                        $this->course_branches_model->delete(array('courseId' => $id));
                        for ($i = 0; $i < count($branchesARR); $i++) {
                            foreach ($branchesARR as $row) {
                                $branchesData['courseId'] = $id;
                                $branchesData['branchesId'] = $row['branchesId'];
                                $branchesData['price'] = $row['price'];
                                $branchesData['duration'] = $row['duration'];
                                $branchesData['weeksNum'] = $row['weeksNum'];
                                $branchesData['lecturesNum'] = $row['lecturesNum'];
                                $branchesData['start'] = $row['start'];
                                $this->course_branches_model->insert($branchesData);
                            }
                        }
                    }
                    if ($this->course_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>" . lang('update_success_message') . "</div>");
                        redirect('admin/branchesCourse', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>" . lang('update_error') . "</div>");
                        redirect('admin/branchesCourse/form/' . $id, 'location');
                    }
                }//end id
                else {//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->course_model->insert($postedArray);
                    if (!empty($id)) {
                        //instructors
                        if (!empty($instructorsARR)) {
                            foreach ($instructorsARR as $key => $value) {
                                $instructorData['instructorId'] = $value;
                                $instructorData['courseId'] = $id;
                                $this->course_instructor_model->insert($instructorData);
                            }
                        }
                        if (!empty($branchesARR)) {
                            foreach ($branchesARR as $key => $value) {
                                $branchesData['branchesId'] = $value;
                                $branchesData['courseId'] = $id;
                                $this->course_branches_model->insert($branchesData);
                            }
                        }

                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>" . lang('insert_success_message') . "</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>" . lang('insert_error') . "</div>");
                    }
                    redirect('admin/branchesCourse', 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/branchesCourse/form');
    }

    function delete() {
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            //delete course
            $this->course_model->delete($id);

            //applications

            $applicationData = $this->application_model->get(array('courseId' => $id));
            $courseName = '';
            $traineeName = '';

            if (!empty($applicationData)) {
                foreach ($applicationData as $application) {
                    //get course name for financial reports
                    if (!empty($application->courseId)) {
                        $courseData = $this->course_model->get($application->courseId);
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

                $this->application_model->delete(array('courseId' => $id));
            }

            redirect('admin/branchesCourse', 'location');
        }
    }
}