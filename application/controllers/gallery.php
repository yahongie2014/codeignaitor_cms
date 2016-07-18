<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('gallery_model');
        $this->load->model('galleryfiles_model');
        $this->load->model('general_model');
        $this->Data['menu_gallery'] = true;
    }

    public function index($type = 0) {
        $this->Data['title'] = lang('gallery');
        $data = array();
        $this->load->view('front/header', $this->Data);

        if(!empty($type)) {
            if($type == "images") {
                $type = 1;
                $data['galleryContent'] = $this->general_model->getWithLanguage(array('pageName' => 'albumsContent'), $this->GetLang);
                $data['albums'] = $this->gallery_model->getWithLanguage(array('type' => 1, 'isActive' => 1), $this->GetLang);
            }
            elseif($type == "videos") {
                $type = 2;
                $data['galleryContent'] = $this->general_model->getWithLanguage(array('pageName' => 'videosContent'), $this->GetLang);
                $data['videos'] = $this->gallery_model->getWithLanguage(array('type' => 2, 'isActive' => 1), $this->GetLang);
            }
            $this->load->view('front/gallery/galleries', $data);
        } else {
            //page general content
            $data['galleryContent'] = $this->general_model->getWithLanguage(array('pageName' => 'galleryContent'), $this->GetLang);
            $data['albumsContent'] = $this->general_model->getWithLanguage(array('pageName' => 'albumsContent'), $this->GetLang);
            $data['videosContent'] = $this->general_model->getWithLanguage(array('pageName' => 'videosContent'), $this->GetLang);
            $data['albums'] = $this->gallery_model->getWithLanguage(array('type' => 1, 'isActive' => 1), $this->GetLang);
            $data['videos'] = $this->gallery_model->getWithLanguage(array('type' => 2, 'isActive' => 1), $this->GetLang);
            $this->load->view('front/gallery/show', $data);
        }

        $this->load->view('front/footer', $this->Data);
    }

    public function view() {
        $this->Data['title'] = lang('gallery');
        $type = $this->uri->segment(2);
        $id = $this->uri->segment(3);

        $this->load->view('front/header', $this->Data);

        if(!empty($id) && !empty($type)) {
            if($type == "images") {
                $type = 1;
                $data['galleryContent'] = $this->general_model->getWithLanguage(array('pageName' => 'albumsContent'), $this->GetLang);
            }
            elseif($type == "videos") {
                $type = 2;
                $data['galleryContent'] = $this->general_model->getWithLanguage(array('pageName' => 'videosContent'), $this->GetLang);
            }
            $data['type'] = $type;
            $data['galleryFiles'] = $this->galleryfiles_model->getWithLanguage(array('galleryId' => $id), $this->GetLang);
            $this->load->view('front/gallery/view', $data);
        } else {
            redirect(base_url(), 'location');
        }

        $this->load->view('front/footer', $this->Data);
    }

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */