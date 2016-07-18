<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends Front_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model( "newsletter_model" );
        $this->load->model('course_model');
        $this->load->model('about_model');
        $this->load->model('about_image_model');
        $this->load->model('our_team_model');
        $this->load->model('blog_model');
        $this->load->model('testimonial_model');
        $this->Data['menu_index'] = true;
    }

    public function index() {

        //about
        $aboutPage = $this->about_model->getWithLanguage(1, $this->GetLang);
        if (!empty($aboutPage)) {
            $aboutPage->aboutImages = $this->about_image_model->get(array('aboutId' => 1));
        }
        $data['aboutPage'] = $aboutPage;


        $data['coursesContent'] = $this->general_model->getWithLanguage(array('pageName' => 'coursesContent'), $this->GetLang);
        //get 4 courses only
        $courses = $this->course_model->getLimited( array('isActive' => 1), 3, 0, $this->GetLang);
        $data['courses'] = $courses;

        //team page general content
        $data['teamContent'] = $this->general_model->getWithLanguage(array('pageName' => 'ourTeam'), $this->GetLang);
        $data['ourTeam'] = $this->our_team_model->getLimited(NULL, 3, 0, $this->GetLang);

        $data['blogContent'] = $this->general_model->getWithLanguage(array('pageName' => 'blogContent'), $this->GetLang);
        $blog = $this->blog_model->getLimited(NULL, 2, 0, $this->GetLang);
        if (!empty($blog)) {
            foreach ($blog as $post) {
                $post->description = $this->cutString($post->description, 400);
            }
        }
        $data['blog'] = $blog;

        $data['testimonials'] = $this->testimonial_model->getWithLanguage(NULL, $this->GetLang);

        $this->load->view('front/header', $this->Data);
        $this->load->view('front/index', $data);
        $this->load->view('front/footer', $this->Data);
    }

    /*
    cut description
     */
    function cutString($string, $max_length) {
          $string = strip_tags($string);
          if (strlen($string) > $max_length) {
            $string = substr($string, 0, $max_length);
            $pos = strrpos($string, " ");
            if ($pos === false) {
              return substr($string, 0, $max_length) . "...";
            }
            return substr($string, 0, $pos) . "...";
          } else {
            return $string;
          }
    }

    // setNewsLetter
    public function setNewsL() {
        $this->form_validation->set_rules( 'news_mail', 'trim|required' );
        $data = array();
        if ( $this->form_validation->run() === false ) {
        } else {
            $data['news_mail'] = '';
            $data['news_mail'] = $this->input->post( 'news_mail' );
            $data['name'] = $this->input->post( 'name' );
            if (!empty($data['news_mail'])) {
                if ( $this->newsletter_model->setNewsL( $data ) == TRUE ) {
                    $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('front_newsletter_messge')."</div>");
                }
            }
        }
        if (isset($_SERVER['HTTP_REFERER']))  {
            redirect($_SERVER['HTTP_REFERER'], 'location');
        }
        else  {
            redirect(base_url(), 'location');
        }
    }

    /**
     * Change language
     */
    public function set_lang() {/////set langauge
        $Lang = $this->uri->segment(3);
        if ( $Lang == 'german' || $Lang == 'arabic' ) {
            $this->session->set_userdata( 'language', $Lang );
            $PageUrl = $_SERVER['HTTP_REFERER'];
            redirect( $PageUrl );
        }
    }
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */