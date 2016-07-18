<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RssFeeds extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
        $this->load->library('admin_ion_auth');
        $this->load->model( "rss_feed_model" );
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_rssFeed'] = true;
        $this->data['admin_menu_rssFeeds'] = true;
    }

    //Show
    public function index() {
        $this->data['page_title'] = lang( 'newsFeed' );

        //get feeds
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        //pagination
        $config['base_url'] = base_url() .'admin/rssFeeds/page/';
        $config['per_page'] = 10;
        $config["uri_segment"] = 4;
        //All rssFeeds
        $rssFeeds = $this->rss_feed_model->getLimited(array('isActive' => 0), $config['per_page'], $page, $this->GetLang);
        $allRssFeeds = $this->rss_feed_model->get(array('isActive' => 0), $this->GetLang);
        $config['total_rows'] = count($allRssFeeds);
        $pagination = '';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        $data['pagination'] = $pagination;

        $data['rssFeeds'] = $rssFeeds;

        //delete feeds which are here from last week and isActive = 1 (user doesn't need it any more)
        $inactiveFeeds = $this->rss_feed_model->getInactive(array('isActive' => 1));
        if(!empty($inactiveFeeds)){
            foreach ($inactiveFeeds as $feed) {
                $this->rss_feed_model->delete($feed->id);
            }
        }

        $this->load->vars($data);
        $this->render('admin/rssFeeds/show');
    }


    public function form() {
        $this->data['page_title'] = lang('news');
        $data['returnedData'] = '';
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->rss_feed_model->get($id);
            $data['returnedData'] = $returnedData;
            if(!empty($returnedData)){
                // $returnedData->adminName = $this->admin_ion_auth->user($returnedData->userId)->row()->username;
            }
        }

        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title'), 'rules' => 'trim|required'),
            array('field' => 'descAR', 'label' => lang('arabic_content'), 'rules' => 'trim|required'),
            array('field' => 'descGE', 'label' => lang('content'), 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        } else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                // $newsData['userId'] = $this->admin_ion_auth->user()->row()->id;
                $newsData['titleAR'] = $postedArray['titleAR'];
                $newsData['titleGE'] = $postedArray['titleGE'];

                // post descriptions as it is without filtering
                global $unsanitized_post;

                $newsData['descAR'] = $unsanitized_post['descAR'];
                $newsData['descGE'] = $unsanitized_post['descGE'];

                //upload image
                $config['upload_path'] = './application/views/images/upload/rssFeeds/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '10000';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload("image")) {
                        //get new image name
                        $uploaded_image = $this->upload->file_name;
                        $newsData['image'] = $uploaded_image;
                        if(!empty($returnedData)){
                            //delete old image
                            $file = $config['upload_path'].$returnedData->image;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('image_msg', "<div class='alert alert-danger'>".lang('insert_error').' '.$this->upload->display_errors()."</div>");
                        redirect('admin/rssFeeds/form/' . $id, 'location');
                    }
                }

                //empty image validation errors if there are any.
                $this->session->set_flashdata('image_msg', "");
                if (!empty($id)) { //update
                    // $newsData['lastModifiedDate'] = date("Y-m-d H:i:s");

                    if ($this->rss_feed_model->update($newsData, $id)) {

                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/rssFeeds/form/' . $id, 'location');
                    }
                } //end id

                redirect('admin/rssFeeds' , 'location');
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/rssFeeds/form');
    }
    //DOEN'T DELETE. It only changes isActive in rss_feeds table
    function delete()
    {
        $updateData['isActive'] = 1; //deleted news

        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {          //delete multiple
            foreach ($choosedItemArr as $id) {
                $this->rss_feed_model->update( $updateData, $id );
            }
        }else{            //delete one row
            $id = (int) $this->uri->segment(4);
            if (!empty($id)) {
                $this->rss_feed_model->update( $updateData, $id );
            }
        }

        if (isset($_SERVER['HTTP_REFERER'])){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect('admin/rssFeeds', 'location');
        }
    }
}
/* End of file rssFeeds.php */
/* Location: ./application/controllers/rssFeeds.php */