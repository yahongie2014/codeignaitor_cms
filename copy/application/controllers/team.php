<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('our_team_model');
        $this->Data['menu_team'] = true;
    }

    public function index($id = 0) {
        $this->Data['title'] = lang('our_team');
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'ourTeam'), $this->GetLang);
        $data['ourTeam'] = $this->our_team_model->getWithLanguage(NULL, $this->GetLang);

        $this->load->view('front/header', $this->Data);
        $this->load->view('front/team', $data);
        $this->load->view('front/footer', $this->Data);
    }
}

/* End of file team.php */
/* Location: ./application/controllers/team.php */