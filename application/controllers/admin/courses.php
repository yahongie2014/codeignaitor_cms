<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses extends MY_Controller {

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
        $this->data['admin_menu_courses'] = true;
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
        $this->render('admin/courses/show');
    }

    /**
     * add, edit forms for courses
     */
    public function form() {
        $this->data['page_title'] = lang('courses');
        $data['returnedData'] = '';
        $data['courseInstructors'] = '';
        $id = (int) $this->uri->segment(4);
        $data['branches'] = $this->branches_model->getWithLanguage(array('isActive' => 1), $this->GetLang);
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
            array('field' => 'price', 'label' => lang('price'), 'rules' => 'trim|required'),
            array('field' => 'duration', 'label' => lang('duration'), 'rules' => 'trim|required'),
            array('field' => 'branches[' . $i . '][branchesId]', 'label' => lang('Branches'), 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][price]', 'label' => lang('price'), 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][duration]', 'label' => lang('duration'), 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][weeksNum]', 'label' => lang('weeksNum'), 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][AvailableSeats]', 'label' => lang('AvailableSeats'), 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][lecturesNum]', 'label' => lang('lecturesNum'), 'rules' => 'trim'),
            array('field' => 'branches[' . $i . '][start]', 'label' => lang('startTime'), 'rules' => 'trim'),
            array('field' => 'isActive', 'label' => lang('isActive'), 'rules' => 'required'),
            array('field' => 'instructorId[]', 'label' => lang('instructors'), 'rules' => 'required'),
            array('field' => 'categoryId', 'label' => lang('Category'), 'rules' => 'trim')
        );
        $this->form_validation->set_rules($validation_rules);
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();
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
                        redirect('admin/courses/form/' . $id, 'location');
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
                           $this->course_branches_model->delete(array('courseId' => $id));
                           foreach ($branchesARR as $row) {
                                $branchesData['courseId'] = $id;
                                $branchesData['branchesId'] = $row['branchesId'];
                                $branchesData['price'] = $row['price'];
                                $branchesData['duration'] = $row['duration'];
                                $branchesData['weeksNum'] = $row['weeksNum'];
                                $branchesData['AvailableSeats'] = $row['AvailableSeats'];
                                $branchesData['lecturesNum'] = $row['lecturesNum'];
                                $branchesData['start'] = $row['start'];
                                $this->course_branches_model->insert($branchesData);
                           }
                                
                    }    
                    if ($this->course_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>" . lang('update_success_message') . "</div>");
                        redirect('admin/courses', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>" . lang('update_error') . "</div>");
                        redirect('admin/courses/form/' . $id, 'location');
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
                            foreach ($branchesARR as $row) {
                                $branchesData['courseId'] = $id;
                                $branchesData['branchesId'] = $row['branchesId'];
                                $branchesData['price'] = $row['price'];
                                $branchesData['duration'] = $row['duration'];
                                $branchesData['weeksNum'] = $row['weeksNum'];
                                $branchesData['AvailableSeats'] = $row['AvailableSeats'];
                                $branchesData['lecturesNum'] = $row['lecturesNum'];
                                $branchesData['start'] = $row['start'];
                                $this->course_branches_model->insert($branchesData);
                                }
                        }

                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>" . lang('insert_success_message') . "</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>" . lang('insert_error') . "</div>");
                    }
                    redirect('admin/courses', 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/courses/form');
    }

    
        function deleteBranshes()
    {         //delete one row
        $id = (int) $this->uri->segment(4);
        $traineeId = (int) $this->uri->segment(5);
        if (!empty($id) && !empty($traineeId)) {
            $this->course_branches_model->deleteBranshes($traineeId);
            redirect('admin/courses/form/'.$id, 'location');
        } else {
            redirect('admin/courses', 'location');
        }
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

            redirect('admin/courses', 'location');
        }
    }

    public function applications() {
        $data['courseName'] = '';
        $data['courseId'] = 0;
        $courseId = $this->uri->segment(4);
        if (!empty($courseId)) {
            $data['courseId'] = $courseId;
            $this->data['page_title'] = lang('applications');
            $returnedData = $this->application_model->getCoursesApplications(array('courseId' => $courseId));
            if (!empty($returnedData)) {
                foreach ($returnedData as $item) {
                    $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                    if (!empty($item->courseId)) {
                        $courseData = $this->course_model->getWithLanguage($item->courseId, $this->GetLang);
                        if (!empty($courseData)) {
                            $item->courseName = $courseData->title;
                            $data['courseName'] = $item->courseName;
                        }
                    }
                }
            }
            $data['returnedData'] = $returnedData;

            $this->load->vars($data);
            $this->render('admin/courses/applications');
        } else {
            redirect('admin/courses', 'location');
        }
    }

    function deleteApplication() {         //delete one row
        //permissions
        $groups = array('admin');
        if (!$this->admin_ion_auth->in_group($groups)) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $id = (int) $this->uri->segment(4);
        $traineeId = (int) $this->uri->segment(5);
        $courseId = (int) $this->uri->segment(6);
        if (!empty($id) && !empty($traineeId) && !empty($courseId)) {

            $application = $this->application_model->get($id);

            if (!empty($application)) {

                //get course name for financial reports
                if (!empty($application->courseId)) {
                    $courseData = $this->course_model->get($application->courseId);
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
            redirect('admin/courses/applications/' . $courseId, 'location');
        } else {
            redirect('admin/courses', 'location');
        }
    }

    // Generate Excel file for all rows
    function excelApplications() {
        $courseName = '';
        $returnedData = array();
        $courseId = $this->uri->segment(4);
        if (!empty($courseId)) {
            $returnedData = $this->application_model->getCoursesApplications(array('courseId' => $courseId));
            if (!empty($returnedData)) {
                foreach ($returnedData as $item) {

                    if (!empty($item->courseId)) {
                        $courseData = $this->course_model->getWithLanguage($item->courseId, $this->GetLang);
                        if (!empty($courseData)) {
                            $item->courseName = $courseData->title;
                            $courseName = $courseData->title;
                        }
                    }
                }
            }
        }

        // Starting the PHPExcel library
        $this->load->library('my_excel');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        // Field names in the first row
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "Id")
                ->setCellValue('B1', "Name")
                ->setCellValue('C1', "Course Name")
                ->setCellValue('D1', "Group");

        if (!empty($returnedData)) {
            $i = 2; //row number
            foreach ($returnedData as $item) {

                // Add data
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item->id)
                        ->setCellValue('B' . $i, $item->name)
                        ->setCellValue('C' . $i, $item->courseName)
                        ->setCellValue('D' . $i, $item->groupName);

                //set columns width to autosize
                $nCols = 10; //set the number of columns
                foreach (range(0, $nCols) as $col) {
                    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
                }
                $objPHPExcel->getActiveSheet()->getStyle("A" . $i . ":D" . $i)->getAlignment()->setWrapText(true); //force it to wrap text on new line (\r)
                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);

                $i++;
            }
        }

        //DOWNLOAD FILE
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $courseName . '_students.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }

    //featured
    public function featured() {
        //permissions
        if ($this->admin_ion_auth->in_group(array('secretary', 'system'))) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $id = $this->uri->segment(4);
        if (!empty($id)) {
            $data = $this->course_model->get($id);

            if (!empty($data)) {
                if ($data->featured == 1) { //already featured
                    $updatedData['featured'] = 0;
                } else { //unapproved, approve it
                    $updatedData['featured'] = 1;
                }
                $this->course_model->update($updatedData, $id);
            }
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect('admin/courses', 'location');
        }
    }

}
