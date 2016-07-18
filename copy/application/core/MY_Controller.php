<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  MY_Controller
*
* Author:  Ben Edmunds
* Created:  7.21.2009
*
* Description:  Class to extend the CodeIgniter Controller Class.  All admin controllers should extend this class.
*
*/

class MY_Controller extends CI_Controller {

    protected $data = Array();
    protected $controller_name;
    protected $action_name;
    protected $previous_controller_name;
    protected $previous_action_name;
    protected $save_previous_url = false;
    protected $page_title;

    public $Style_Sheet = 'css';
    public $GetLang = 'arabic';

    public function __construct() {
        parent::__construct();
        $this->output->set_header('Content-Type: text/html; charset=utf-8');

        //save the previous controller and action name from session
        $this->previous_controller_name = $this->session->flashdata('previous_controller_name');
        $this->previous_action_name     = $this->session->flashdata('previous_action_name');

        //set the current controller and action name
        $this->controller_name = $this->router->fetch_directory() . $this->router->fetch_class();
        $this->action_name     = $this->router->fetch_method();

        $this->data['content'] = '';
        $this->data['css']     = '';
        $this->data['feedsCount']     = '';

        $this->load->library('admin_ion_auth');

        if ($this->uri->uri_string() !== 'admin/auth/login' && !$this->admin_ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        }


        //language setting
        if ($this->session->userdata('language') == TRUE) {
            $this->lang->load('cp', $this->session->userdata('language'));
            $this->config->set_item('language', $this->session->userdata('language'));
            (string) $Lang = $this->session->userdata('language');
            if ($Lang === 'arabic') {
                $this->Style_Sheet = 'css_rtl';
                (string) $this->GetLang = 'arabic';
            }
        } else {
            $this->lang->load('cp', 'arabic');
            $this->config->set_item('language', 'arabic');
        }

        //get logged in user data
        if($this->admin_ion_auth->user()->row()){
            $userId = $this->admin_ion_auth->user()->row()->id;
            $userData = array(
               'adminId' => $userId
            );
            $this->session->set_userdata( $userData );
        }

        $this->rssReader();

    }

    protected function renderLogin($template='login') {
        //save the controller and action names in session
        if ($this->save_previous_url) {
            $this->session->set_flashdata('previous_controller_name', $this->previous_controller_name);
            $this->session->set_flashdata('previous_action_name', $this->previous_action_name);
        }
        else {
            $this->session->set_flashdata('previous_controller_name', $this->controller_name);
            $this->session->set_flashdata('previous_action_name', $this->action_name);
        }

        $view_path = $this->controller_name . '/' . $this->action_name . '.php'; //set the path off the view
        //echo "<center><h1>".$view_path."</h1></center>";
        if (file_exists(APPPATH . 'views/' . $view_path)) {
            $this->data['content'] .= $this->load->view($view_path, $this->data, true);  //load the view
        }
        $this->load->view("layouts/$template.tpl.php", $this->data);  //load the template
    }

    protected function render($view_path) {
        //save the controller and action names in session
        if ($this->save_previous_url) {
        	$this->session->set_flashdata('previous_controller_name', $this->previous_controller_name);
        	$this->session->set_flashdata('previous_action_name', $this->previous_action_name);
        }
        else {
        	$this->session->set_flashdata('previous_controller_name', $this->controller_name);
        	$this->session->set_flashdata('previous_action_name', $this->action_name);
        }

        $view_path = $view_path. '.php'; //set the path off the view
        // echo "<center><h1>".$view_path."</h1></center>";
        if (file_exists(APPPATH . 'views/' . $view_path)) {
            $this->data['content'] .= $this->load->view($view_path, $this->data, true);  //load the view
        }
        $this->load->view("layouts/main.tpl.php", $this->data);  //load the template
    }

    protected function add_title() {
    	$this->load->model('page_model');
    	//the default page title will be whats set in the controller
    	//but if there is an entry in the db override the controller's title with the title from the db
    	$page_title = $this->page_model->get_title($this->controller_name,$this->action_name);
    	if ($page_title) {
    		$this->data['page_title'] = $page_title;
    	}
    }

    protected function save_url() {
    	$this->save_previous_url = true;
    }

    function rssReader()
    {
        $feedsCount = 0;
        // Load RSS Parser
        $this->load->library('rssparser');

        $this->load->model('rss_website_model');
        $this->load->model('rss_feed_model');
        $rssWesites = $this->rss_website_model->get();
        if(!empty($rssWesites)) {
            foreach ($rssWesites as $website) {
               // Get RSS
                //get last 50 feeds
                if (!empty($website->url)) {
                    $rss[] = $this->rssparser->set_feed_url($website->url)->set_cache_life(30)->getFeed(50);
                    if (!empty($rss)) {
                        foreach ($rss as $feed){
                            foreach ($feed as $item){
                                $title = $item['title'];
                                $url = $item['link'];
                                // print_r($item);

                                //check if title already exists to make sure that it will not be inserted twice.
                                $feedsData = $this->rss_feed_model->get(array('rss_feeds.url LIKE "'.$url.'"' => NULL));
                                if(!empty($feedsData)){ //exists
                                } else {  //not found
                                    $data['titleAR'] =  $title;
                                    $data['titleGE'] =  $title;
                                    $data['descAR'] =  $item['description'];
                                    $data['descGE'] =  $item['description'];
                                    $data['pubDate'] =  date('Y-m-d H:i:s' ,strtotime($item['pubDate']));
                                    $data['url'] =  $item['link'];
                                    $data['image'] =  $item['image'];
                                    $data['rssWebsiteId'] =  $website->id;
                                    $data['addingDate'] =  date('Y-m-d');
                                    $data['isActive'] =  0;

                                    $this->rss_feed_model->insert($data);
                                }
                            }
                        }

                    }
                }
                //count feeds from the last 3 days and inform user as new feeds
                $feedsCount += $this->rss_feed_model->getCount(array('rssWebsiteId' => $website->id, 'isActive' => 0));
            }
        }
        $this->data['feedsCount'] = $feedsCount;
    }
}