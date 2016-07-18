<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Partners extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('partner_model');
        $this->Data['menu_partners'] = true;
    }

    public function index() {
        //approved partners
        $this->Data['title'] = lang('partners');
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'partnersContent'), $this->GetLang);
        $data['partners'] = $this->partner_model->getWithLanguage(NULL, $this->GetLang);

        $this->load->view('front/header', $this->Data);
        $this->load->view('front/partners', $data);
        $this->load->view('front/footer', $this->Data);
    }
}

/* End of file partners.php */
/* Location: ./application/controllers/partners.php */