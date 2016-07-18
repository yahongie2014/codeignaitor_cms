<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_categories'] = true;
    }

    public function index() {
        $this->data['page_title'] = lang('categories');
        $returnedData = $this->category_model->getWithLanguage(NULL, $this->GetLang);
        if(!empty($returnedData)){
            foreach ($returnedData as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
            }
        }
        $data['returnedData'] = $returnedData;

        $this->load->vars($data);
        $this->render('admin/categories/show');
    }

    /**
     * add, edit forms for categories
     */
    public function form() {
        $this->data['page_title'] = lang('categories');
        $data['returnedData'] = '';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->category_model->get($id);
            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'isActive', 'label' => lang('isActive'), 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST){

                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                if (!empty($id)) { //update
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->category_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/categories', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/categories/form/' . $id, 'location');
                    }
                }//end id
                else{//insert
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    if ($this->category_model->insert($postedArray)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/categories' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/categories/form');
    }

    function delete()
    {
        $this->load->model('course_model');

        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                if (!empty($id)) {
                    $courses = $this->course_model->get(array('categoryId' => $id));
                    if (!empty($courses)) { //show alert
                       $itemData = $this->category_model->getWithLanguage($id, $this->GetLang);
                       $this->session->set_flashdata( 'msg_class', 'alert alert-danger' );
                       $this->session->set_flashdata( 'msg', $itemData->title.': '.lang( 'delete_alert' ) );
                    } else {     //delete
                        $this->category_model->delete($id);
                    }
                }
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $courses = $this->course_model->get(array('categoryId' => $id));
                if (!empty($courses)) { //show alert
                   $itemData = $this->category_model->getWithLanguage($id, $this->GetLang);
                   $this->session->set_flashdata( 'msg_class', 'alert alert-danger' );
                   $this->session->set_flashdata( 'msg', $itemData->title.': '.lang( 'delete_alert' ) );
                } else {     //delete
                    $this->category_model->delete($id);
                }
            }
        }
        redirect('admin/categories', 'location');
    }
}