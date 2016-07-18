<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends Front_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('blog_model');
        $this->load->model( "tag_model" );
        $this->load->model( "natag_model" );
        $this->Data['title'] = lang('front_blog');
        $this->Data['menu_blog'] = true;
    }

    public function index() {
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'blogContent'), $this->GetLang);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //pagination
        $config['base_url'] = base_url() .'blog/page/';
        $config['per_page'] = 4;
        $config["uri_segment"] = 3;
        //All blog
        $blog = $this->blog_model->getLimited(NULL, $config['per_page'], $page, $this->GetLang);
        $allblog = $this->blog_model->get();
        $config['total_rows'] = count($allblog);
        $pagination = '';
        if(!empty($blog)) {
            foreach ($blog as $item) {
                $item->description = $this->cutString($item->description, 400);
               $item->addingDate = $this->date_arabic($item->addingDate);
            }
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
        }

         $data['pagination'] = $pagination;
        $data['blog'] =  $blog;

        $this->load->view('front/header', $this->Data);
        $this->load->view('front/blog/show', $data);
        $this->load->view('front/footer', $this->Data);
    }

    public function view(){
        $id = $this->uri->segment(2);
        if(!empty($id)) {
            $post = $this->blog_model->get($id, $this->GetLang);
            if(!empty($post)){
                $this->Data['title'] = $post->title;

                $this->load->library('ion_auth');
                $userData = $this->ion_auth->user($post->userId)->row();
                if (!empty($userData)) {
                    $post->firstName = $userData->first_name;
                    $post->lastName = $userData->last_name;
                }

                $post->tags = $this->tag_model->getTags(array('newsArticleId' => $id), $this->GetLang);
            }
            $post->addingDate = $this->date_arabic($post->addingDate);
            $data['post'] =  $post;

            $this->load->view('front/header', $this->Data);
            $this->load->view('front/blog/single', $data);
            $this->load->view('front/footer', $this->Data);

        } else {
            redirect(base_url().'blog');
        }
    }

    public function search() {
        $data = '';
        $blog = '';
        $type = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        if(!empty($type) && !empty($id)){

            $page = ( $this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            // echo $page;
            //pagination
            $config['base_url'] = base_url() .'blog/'.$type.'/'.$id.'/page/';
            $config['per_page'] = 4;
            $config["uri_segment"] = 5;

            if($type == 't'){ //search by tagId
                $blog = $this->blog_model->getByTagIdLimited(array('tagId' => $id), $config['per_page'], $page, $this->GetLang);
                $allArticles = $this->blog_model->getByTagId(array('tagId' => $id), $this->GetLang);
                $config['total_rows'] = count($allArticles);
            }

            $pagination = '';
            if(!empty($blog)) {
                foreach ($blog as $item) {
                    $item->description = $this->cutString($item->description, 400);
                }
                $this->pagination->initialize( $config );
                $pagination = $this->pagination->create_links();
            }
            $data['pagination'] = $pagination;
            $data['blog'] =  $blog;
        } else {
            redirect(base_url().'blog');
        }

        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'blogContent'), $this->GetLang);
        $this->load->view('front/header', $this->Data);
        $this->load->view('front/blog/show', $data);
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
        public function date_arabic($t) {
        $timestamp = strtotime($t);
        $months = array("Jan" => "يناير","Feb" => "فبراير","Mar" => "مارس","Apr" => "أبريل","May" => "مايو","Jun" => "يونيو","Jul" => "يوليو","Aug" => "أغسطس","Sep" => "سبتمبر","Oct" => "أكتوبر","Nov" => "نوفمبر","Dec" => "ديسمبر");
        $en_month = date("M", $timestamp);
        foreach ($months as $en => $ar) {
            if ($en == $en_month) {
                $ar_month = $ar;
            }
        }
        $find = array("Sat","Sun","Mon","Tue","Wed","Thu","Fri");
        $replace = array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
        $ar_day_format = date('D', $timestamp); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);
        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
        $current_date = $ar_day . ' ' . date('d', $timestamp) . '  ' . $ar_month . '  ' . date('Y', $timestamp);
        $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);
        return $arabic_date;
    }
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */