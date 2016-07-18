<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Branches extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        $this->load->model('branches_model');
        $this->load->model('instructor_model');
        $this->load->model('course_instructor_model');
        $this->load->model('application_model');
        $this->load->model('trainee_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_branches'] = true;
        $this->session->keep_flashdata('image_msg');
    }

    public function index() {
        $this->data['page_title'] = lang('branches');
        $returnedData = $this->branches_model->getWithLanguage(NULL, $this->GetLang);
        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                if (!empty($item->categoryId)) {
                    $categoryData = $this->category_model->getWithLanguage($item->categoryId, $this->GetLang);
                    if(!empty($categoryData)) {
                        $item->categoryName = $categoryData->title;
                    }
                }
            }
        }
        
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/branches/show');
    }

    /**
     * add, edit forms for courses
     */
    public function form() {
        $this->data['page_title'] = lang('courses');

        $rowId = 1;
        $marker = array();
        //get branche info
         
        $latitude = '30.053998821776116';
        $lagitude = '31.255963410028016';
        
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->branches_model->get($id);
            if(!empty($returnedData)){
                $latitude = $returnedData->latitude;
                $lagitude = $returnedData->lagitude;
            } else {
            $latitude = '30.053998821776116';
            $lagitude = '31.255963410028016';
        }
            $data['branchesInfo'] = $returnedData;
        }
            $data['latitude'] = $latitude;
            $data['lagitude'] = $lagitude;
       
        
        
        
        ////////////
        //draw the map
        $this->load->library('googlemaps');
        $config['center'] = $latitude.', '.$lagitude;//latitude, lagitude of the company in google maps
        $config['zoom'] = '14';//'auto';
        $this->googlemaps->initialize($config);

        $marker['position'] =  $latitude.', '.$lagitude;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        ///////////////////////

        
        $data['returnedData'] = '';
        $data['courseInstructors'] = '';
        $id = (int) $this->uri->segment(4);


        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title') , 'rules' => 'trim|required'),
            array('field' => 'desAR', 'label' => lang('desAR'), 'rules' => 'trim|max_length[200]'),
            array('field' => 'desGE', 'label' => lang('desGE'), 'rules' => 'trim|max_length[200]'),
            array('field' => 'isActive', 'label' => lang('isActive'), 'rules' => 'required'),
            array('field' => 'phone', 'label' => lang('phone'), 'rules' => 'trim'),
            array('field' => 'mail', 'label' => lang('Email'), 'rules' => 'trim')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                //delete instructorId from array because it is not in the courses table
                unset($postedArray['instructorId']);


                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");
                    //instructors
                    if(!empty($instructorsARR)) {
                        //delete old
                        $this->branches_model->delete(array('id' => $id));
                    }
          
                    if ($this->branches_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/branches', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/branches/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");
                    $id = $this->branches_model->insert($postedArray);
                    if (!empty($id)) {
                        //instructors
                        if(!empty($instructorsARR)) {
                            foreach($instructorsARR as $key => $value){
                                $instructorData['instructorId'] = $value;
                                $instructorData['courseId'] = $id;
                                $this->course_instructor_model->insert($instructorData);
                            }
                        }
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                        redirect('admin/branches', 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/branches/form');
    }

    function delete()
    {
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
                //delete course
                $this->branches_model->delete($id);
                redirect('admin/branches', 'location');

        }
    }



    //featured
    public function featured()
    {
        //permissions
        if ($this->admin_ion_auth->in_group(array('secretary', 'system'))) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $id = $this->uri->segment(4);
        if ( !empty( $id )) {
            $data = $this->course_model->get($id);
            if(!empty($data)) {
                if($data->featured == 1) { //already featured
                    $updatedData['featured'] = 0;
                }
                else{ //unapproved, approve it
                    $updatedData['featured'] = 1;
                }
                $this->course_model->update($updatedData, $id);
            }
        }

        if (isset($_SERVER['HTTP_REFERER'])){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect('admin/courses', 'location');
        }
    }
}