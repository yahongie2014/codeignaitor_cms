<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Tags extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
        $this->load->model("tag_model");
        $this->load->model("natag_model");
        $this->data['css'] = $this->Style_Sheet;
    }

    //Show
    public function index() {
        $this->data['page_title'] = lang('tags');
        $type = $this->uri->segment(3);
        if(!empty($type)) {
            $this->data['admin_menu_tags_'.$type] = true;

            $returnedData = $this->tag_model->get(array('type' => $type), $this->GetLang);

            if(!empty($returnedData)) {
                foreach ($returnedData as $item) {
                    $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                }
            }
            $data['returnedData'] = $returnedData;
            $data['type'] = $type;

            $this->load->vars($data);
            $this->render('admin/tags/show');
        }
        else {
            redirect('admin','refresh') ;
        }
    }

    public function form() {
        $this->data['page_title'] = lang('tags');
        $data['returnedData'] = '';

        //edit
        $id = (int) $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if (!empty($id)) {
            $returnedData = $this->tag_model->get($id);
            $data['returnedData'] = $returnedData;
        }

        if(!empty($type)) {
            $data['type'] = $type;
            $this->data['admin_menu_tags_'.$type] = true;
            $validation_rules = array(
                array('field' => 'titleAR','label' => lang('arabic_title'),'rules' => 'trim|required'),
                array('field' => 'titleGE','label' => lang('title').'('.lang('german').')','rules' => 'trim|required')
           );
            $this->form_validation->set_rules($validation_rules);
            if ($this->form_validation->run() == false) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            } else {
                if($_POST) {
                    $postedArray = $this->input->post(NULL, TRUE);
                    $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;
                    $postedArray['type'] = $type;

                    if (!empty($id)) { //update
                        $postedArray['lastModifiedDate'] = date("Y-m-d");

                        if ($this->tag_model->update($postedArray, $id)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                            redirect('admin/tags/'.$type, 'location');
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                            redirect('admin/tags/form/' . $id.'/'.$type, 'location');
                        }
                    }//end id
                    else{//insert
                        $postedArray['addingDate'] = date("Y-m-d");
                        if ($this->tag_model->insert($postedArray)) {
                            $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        } else {
                            $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                        }
                        redirect('admin/tags/'.$type , 'location');
                    }
                }//post
            }//else
            $this->load->vars($data);
            $this->render('admin/tags/form');
        } //type
        else {
            redirect('admin','refresh') ;
        }
    }

    function delete()
    {
        if($_POST['choosedItem']) {
            $choosedItemArr = $_POST['choosedItem'];
            if (count($choosedItemArr) > 0) {          //delete multiple
                $type = $this->uri->segment(4);
                foreach ($choosedItemArr as $id) {
                    $naTags = $this->natag_model->get(array('tagId'=> $id));
                    if(!$naTags || !isset($naTags))
                    {                        //delete
                        $this->tag_model->delete($id);
                    }
                    else
                    {
                       $itemData = $this->tag_model->get($id);
                       $this->session->set_flashdata('msg_class', 'alert alert-danger');
                       $this->session->set_flashdata('msg', $itemData->title.'   '.lang('delete_alert'));
                    }
                }
            }
        } else{            //delete one row
            $id = (int) $this->uri->segment(4);
            $type = $this->uri->segment(5);
            if (!empty($id)) {
                $naTags = $this->natag_model->get(array('tagId'=> $id));
                if(!$naTags || !isset($naTags))
                {                        //delete
                    $this->tag_model->delete($id);
                }
                else
                {
                   $itemData = $this->tag_model->get($id);
                   $this->session->set_flashdata('msg_class', 'alert alert-danger');
                   $this->session->set_flashdata('msg', $itemData->title.'   '.lang('delete_alert'));
                }
            }
        }
        redirect('admin/tags/'.$type, 'location');
    }

}
/* End of file tags.php */
/* Location: ./application/controllers/admin/tags.php */