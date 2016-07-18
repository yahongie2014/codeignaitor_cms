<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('general_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_website'] = true;
    }

    /**
    * edit form (for general titles and description of frontend pages)
    */
    public function index() {
        $data['returnedData'] = '';

        $type = $this->uri->segment(3);
        if(!empty($type)){
            if($type == 'ourTeam'){ $this->data['page_title'] = lang('our_team_content'); }
            else{ $this->data['page_title'] = lang($type); }

            $this->data['admin_menu_'.$type] = true;
        }
        $data['type'] = $type;
        $id = 0;
        if (!empty($type)) {
            $returnedData = $this->general_model->get(array('pageName' => $type));
            if(!empty($returnedData)){
                $id = $returnedData->id;
            }
            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'titleAR','label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE','label' => lang('title').' ( '.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'captionAR','label' => lang('captionAR'), 'rules' => 'trim'),
            array('field' => 'captionGE','label' => lang('captionGE'), 'rules' => 'trim')
        );

        array_push($validation_rules,
        array('field' => 'title1AR', 'label' => lang('title'), 'rules' => 'trim'),
        array('field' => 'title2AR', 'label' => lang('title'), 'rules' => 'trim'),
        array('field' => 'title3AR', 'label' => lang('title'), 'rules' => 'trim'),
        array('field' => 'title1GE', 'label' => lang('title'), 'rules' => 'trim'),
        array('field' => 'title2GE', 'label' => lang('title'), 'rules' => 'trim'),
        array('field' => 'title3GE', 'label' => lang('title'), 'rules' => 'trim'));

        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            //set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('msg'));
        }else {
            if($_POST)
            {
                if(!empty($type)){
                    $postedArray = $this->input->post( NULL, TRUE );
                    $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;
                    $postedArray['pageName'] = $type;

                    if (!empty($id)) { //update
                        $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");
                        if ($this->general_model->update($postedArray, $id)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                            redirect('admin/general/'.$type, 'location');
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        }
                    }
                    else{//insert
                        $postedArray['addingDate'] = date("Y-m-d H:i:s");
                        if ($this->general_model->insert($postedArray)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                        }
                    }
                    redirect('admin/general/'.$type, 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/general/form');
    }
}