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
            }
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
        }
        // echo "<pre>";
        // print_r($blog);
        // echo "</pre>";
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
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */