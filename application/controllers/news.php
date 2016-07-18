<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends Front_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('rss_feed_model');
        $this->Data['title'] = lang('front_news');
        $this->Data['menu_news'] = true;
    }

    public function index() {
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'newsContent'), $this->GetLang);

        $this->rssReader();

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //pagination
        $config['base_url'] = base_url() .'news/page/';
        $config['per_page'] = 4;
        $config["uri_segment"] = 3;
        //All active newsFeeds
        $news = $this->rss_feed_model->getLimited(array('isActive' => 0), $config['per_page'], $page, $this->GetLang);

        $allRssFeeds = $this->rss_feed_model->get(array('isActive' => 0));
        $config['total_rows'] = count($allRssFeeds);
        $pagination = '';
        if(!empty($news)) {
            foreach ($news as $item) {
                $item->description = $this->cutString($item->description, 400);
                $item->pubDate = $this->date_arabic($item->pubDate);
            }
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
        }
        $data['pagination'] = $pagination;
        $data['news'] =  $news;

        $this->load->view('front/header', $this->Data);
        $this->load->view('front/news/show', $data);
        $this->load->view('front/footer', $this->Data);
    }

    public function view(){
        $id = $this->uri->segment(2);
        if(!empty($id)) {
            $post = $this->rss_feed_model->get($id, $this->GetLang);
            if(!empty($post)){
                $this->Data['title'] = $post->title;
            }
            $data['post'] =  $post;

            $this->load->view('front/header', $this->Data);
            $this->load->view('front/news/single', $data);
            $this->load->view('front/footer', $this->Data);

        } else {
            redirect(base_url().'news');
        }
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
                                    $data['image'] =   $this->grab_image($item['link']);
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
    
            
            function grab_image($url){

$htmlContent = file_get_contents($url);

// read all image tags into an array
preg_match_all('/<img[^>]+>/i',$htmlContent, $imgTags); 

for ($i = 0; $i < count($imgTags[0]); $i++) {
  // get the source string
  preg_match('/src="([^"]+)/i',$imgTags[0][$i], $imgage);

  // remove opening 'src=' tag, can`t get the regex right
  $origImageSrc[] = str_ireplace( 'src="', '',  $imgage[0]);
}
// will output all your img src's within the html string
return $origImageSrc[3];
               
        }
    
        //print date arabic
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

/* End of file news.php */
/* Location: ./application/controllers/news.php */