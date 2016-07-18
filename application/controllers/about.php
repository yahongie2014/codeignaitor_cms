<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('about_model');
        $this->load->model('about_image_model');
        $this->load->model('about_section_model');
        $this->load->model('blog_model');
        $this->load->model('our_team_model');
        $this->load->model('general_model');
        $this->Data['menu_about'] = true;
    }

    public function index() {
        $this->Data['title'] = lang('about');
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'aboutContent'), $this->GetLang);

        //team page general content
        $aboutId = 1;
        $data['aboutPage'] = $this->about_model->getWithLanguage($aboutId, $this->GetLang);
        $data['aboutImages'] = $this->about_image_model->get(array('aboutId' => $aboutId));
        $data['sections'] = $this->about_section_model->getWithLanguage(array('aboutId' => $aboutId), $this->GetLang);


        //team page general content
        $data['teamContent'] = $this->general_model->getWithLanguage(array('pageName' => 'ourTeam'), $this->GetLang);
        $data['ourTeam'] = $this->our_team_model->getLimited(NULL, 3, 0, $this->GetLang);

        $this->load->view('front/header', $this->Data);
        $this->load->view('front/about', $data);
        $this->load->view('front/footer', $this->Data);
    }
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */