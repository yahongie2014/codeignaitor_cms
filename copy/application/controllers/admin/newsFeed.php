<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsFeed extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
        $this->load->library('admin_ion_auth');
        $this->load->model('rss_website_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_rssFeed'] = true;
        $this->data['admin_menu_newsFeed'] = true;
    }

    //Show
    public function index() {
        $this->data['page_title'] = lang( 'newsFeedSettings' );
        $data = $this->getData();
        $this->load->vars($data);
        $this->render('admin/newsFeed/show');
    }

    public function rssWebsites(){
        //form
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $rssWesite = $this->rss_website_model->get($id);
            $data['rssWesite'] = $rssWesite;
        }

        $validation_rules = array(
            array(
                'field' => 'websiteName',
                'label' => lang('websiteName'),
                'rules' => 'trim|required'
                ),
            array(
                'field' => 'url',
                'label' => lang('url'),
                'rules' => 'trim|required|callback_valid_url_format'
                )
            );
        $this->form_validation->set_rules($validation_rules);
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
            //set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('msg'));
        }else {
            if($_POST)
            {
                $postedArray = $this->input->post( NULL, TRUE );
                //check if name already exists
                if(!empty($id)){
                    $this->checkIfNameExists($postedArray['websiteName'], 'admin/newsFeed/rssWebsites/'.$id, $id);
                }else{
                    $this->checkIfNameExists($postedArray['websiteName'], 'admin/newsFeed/rssWebsites/', 0);
                }

                $dbData['websiteName'] = $postedArray['websiteName'];
                $dbData['url'] = $postedArray['url'];

                if (!empty($id)) { //update
                    $dbData['lastModifiedDate'] = date("Y-m-d");
                    $dbData['modifyUserId'] = $this->admin_ion_auth->user()->row()->id;

                    if ($this->rss_website_model->update($dbData, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/newsFeed', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/newsFeed/rssWebsites/'. $id, 'location');
                    }
                }//end id
                else{//insert
                    $dbData['addingDate'] = date("Y-m-d");
                    $dbData['addUserId'] = $this->admin_ion_auth->user()->row()->id;
                    $id = $this->rss_website_model->insert($dbData);
                    if ($id) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/newsFeed', 'location');
                }
            }//post
        }//else

        $this->load->vars($data);
        $this->render('admin/newsFeed/show');
    }

    function getData(){
            //get user's rss websites for this client
        $userId = $this->admin_ion_auth->user()->row()->id;
        $rssWesites = $this->rss_website_model->get();
        if(!empty($rssWesites)) {
            foreach ($rssWesites as $item) {
                //get usernames
                $item->addUsername = $this->admin_ion_auth->user($item->addUserId)->row()->username;
                if(!empty($item->modifyUserId)){
                    $item->modifyUsername = $this->admin_ion_auth->user($item->modifyUserId)->row()->username;
                }else{
                    $item->modifyUsername = 0;
                }
            }
        }
        $data['rssWesites'] = $rssWesites;
        return $data;
    }

    function valid_url_format($str){

        $this->load->library('form_validation');
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            if($str!=''){
                $this->form_validation->set_message('valid_url_format', lang('url_error'));
                return FALSE;
            }
            else{
                return TRUE;
            }
        }
        return TRUE;
    }

    function deleteWebsite()
    {
        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                    $this->rss_website_model->delete( $id );
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->rss_website_model->delete( $id );
         }
        }

        if (isset($_SERVER['HTTP_REFERER'])){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect('admin/newsFeed', 'location');
        }
    }

    public function checkIfNameExists($websiteName, $redirect, $id = 0) {
        //if title aleady exists, print a notification
        if($this->rss_website_model->get(array('websiteName'=> $websiteName, 'id !=' => $id))) {
            $this->session->set_flashdata( 'msg', ' <div id="divMessage" class="alert alert-danger">'.lang( 'title_exists' ) . '('.$websiteName.') </div>');
            redirect( $redirect, 'location' );
        }
    }

}
/* End of file rssFeed.php */
/* Location: ./application/controllers/rssFeed.php */