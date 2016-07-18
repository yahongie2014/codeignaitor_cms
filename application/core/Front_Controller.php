<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Front_Controller
*
* Author:  Yasmeen
* Created:  7.02.2014
*
* Description:  Class to extend the CodeIgniter Controller Class.  All front controllers should extend this class.
*
*/

class Front_Controller extends CI_Controller {

    protected $data = Array();

    protected $loggedInUser = array();
    protected $loggedInUserGroup = array();
    protected $userId = '';
    protected $userName = '';
    protected $userGroupId = '';
    public $Style_Sheet = 'style.css';
    public $front = 'front_rtl';
    public $GetLang = 'arabic';

    public function __construct() {
        parent::__construct();

        $this->Data['indexPage'] = FALSE;
        //Language Settings
        if ( $this->session->userdata( 'language' ) == TRUE ) {
            $this->lang->load( 'cp', $this->session->userdata( 'language' ) );
            $this->config->set_item( 'language', $this->session->userdata( 'language' ) );

            (string) $Lang = $this->session->userdata( 'language' );

            if ( $Lang === 'german' ) {
                $this->Style_Sheet = 'style.css';
                $this->front = 'front_ltr';
                (string) $this->GetLang = 'german';
            }
        } else {
            $this->lang->load( 'cp', 'arabic' );
            $this->config->set_item( 'language', 'arabic' );
        }

        $this->Data['css'] = $this->Style_Sheet;
        $this->Data['front'] = $this->front;
        if ( !empty( $this->front ) && $this->front == 'front_rtl' ) {
            $this->Data['dir'] = '';
        } else {
            $this->Data['dir'] = 'ltr';
        }
        $this->Data['url'] = base_url().'application/views/front/'.$this->front.'/';

        $this->load->library(array('session'));


        $this->load->model('general_model');
        $this->load->model('contactus_model');
        $this->load->model('banner_model');

        //get contact info
        $this->Data['contactContent'] = $this->general_model->getWithLanguage(array('pageName' => 'contactContent'), $this->GetLang);
        $contactInfo = $this->contactus_model->getContactInfoForFront(1, $this->GetLang);
        $this->Data['contactInfo'] = $contactInfo;
        $this->Data['paypalEmail'] = '';
        $this->paypalEmail = '';
        $this->twitter = '';
        if (!empty($contactInfo)) {
            $this->Data['paypalEmail'] = $contactInfo->paypalEmail;
            $this->paypalEmail = $contactInfo->paypalEmail;
            $this->twitter = $contactInfo->twitter;
            $this->config->load('paypal_ipn');
            $this->config->set_item('paypal_ipn_live_settings', array(
                        'email' => $contactInfo->paypalEmail, // Your merchant email address
                        'url' => 'https://www.paypal.com/cgi-bin/webscr', // PayPal's IPN handler for validating the data
                        'debug' => FALSE
                    ));
        }
        $this->Data['bannerData'] = $this->banner_model->getWithLanguage(1, $this->GetLang);

        $this->Data['twitterFeed'] = $this->twitter_feed();
    }

    function twitter_feed() {

        if(!empty($this->twitter)){
            $username = '';
            $resultArray = explode('/', $this->twitter);
            if (!empty($resultArray)) {
                $username = end($resultArray);
            }

            //Twitter Application Class and Keys
            require_once( APPPATH . "third_party/TwitterAPIExchange.php" );
            /* this class file is attached here click this link http://lvsclasses.blogspot.in/2013/12/twitter-direct-messages-through.html*/
            $settings = array( 'oauth_access_token' => " 295594436-3zbsonZ7MgF36ipkO4kpK9Q40g2utLuBRgxUgipW",
                'oauth_access_token_secret' => "NIt8uKNw2yHea59lEiN0zbtBQg4tAnoLHfhc81zcTuSu7",
                'consumer_key' => "W11NZZ77JETRy36qdNAVudYeE",
                'consumer_secret' => "4fTrYVPvkpH1NuUnc92Wqwgwj6wXbcaNIekZxAaUolWVGu5YQm" );
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
            // The request method, according to the docs, is GET, not POST
            $requestMethod = 'GET';
            // Set up your get string, we're using my screen name here
            $getfield = '?screen_name='.$username.'&count=3';
            //count it means how many latest tweets you want.
            // Create the object
            $twitter = new TwitterAPIExchange($settings);
            // Make the request and get the response into the $json variable
            $json = $twitter->setGetfield($getfield) ->buildOauth($url, $requestMethod) ->performRequest();
            // It's json, so decode it into an array
            $result = json_decode($json);
            // $tweets = '';
            // if(!empty($result)){
            //     foreach ($result as $entry) {
            //         $tweets = '
            //         <div class="simple-slide">
            //             <div class="social-update">'.$entry->text ."</div></div><br>";
            //     }
            // }
            // Access the profile_image_url element in the array
            //echo $result->profile_image_url;
            return $result;
        }
    }
}