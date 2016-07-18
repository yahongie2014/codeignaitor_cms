<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Events extends Front_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('event_model');
        $this->load->model( "event_application_model" );
        $this->load->model('contactus_model');
        $this->Data['title'] = lang('front_events');
        $this->Data['menu_events'] = true;
    }

    public function index() {
        //page general content
        $data['generalContent'] = $this->general_model->getWithLanguage(array('pageName' => 'eventsContent'), $this->GetLang);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //pagination
        $config['base_url'] = base_url() .'events/page/';
        $config['per_page'] = 4;
        $config["uri_segment"] = 3;
        //All events
        $events = $this->event_model->getLimited(NULL, $config['per_page'], $page, $this->GetLang);
        $allevents = $this->event_model->get();
        $config['total_rows'] = count($allevents);
        $pagination = '';
        if(!empty($events)) {
            foreach ($events as $item) {
                $item->content = $this->cutString($item->content, 400);
            }
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
        }

        $data['pagination'] = $pagination;
        $data['events'] =  $events;

        for ($i = 0; $i < count($events); $i++) {
            $events[$i]->date = $this->date_arabic($events[$i]->date);
            $events[$i]->startTime = $this->time_arabic($events[$i]->startTime);
            $events[$i]->endTime = $this->time_arabic($events[$i]->endTime);
        }
        $this->load->view('front/header', $this->Data);
        $this->load->view('front/events/show', $data);
        $this->load->view('front/footer', $this->Data);
    }

    public function view(){
        $id = $this->uri->segment(2);
        if(!empty($id)) {
            $post = $this->event_model->getWithLanguage($id, $this->GetLang);
            if(!empty($post)){
                $this->Data['title'] = $post->title;
            }
            $data['post'] =  $post;
            $post->addingDate = $this->date_arabic($post->addingDate);

            $this->load->view('front/header', $this->Data);
            $this->load->view('front/events/single', $data);
            $this->load->view('front/footer', $this->Data);

        } else {
            redirect(base_url().'events');
        }
    }

    function apply() {

        $response['message'] = '';
        $response['errors'] = '';
        $response['status'] = '';
        $eventId = $this->uri->segment(3);
        if(!empty($eventId)) {
            //show form and insert
            $this->form_validation->set_rules('name', lang('front_name'), 'trim|required');
            $this->form_validation->set_rules('email', lang('front_email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('tel', lang('front_phone'), 'trim');

            if ($this->form_validation->run() == false) {
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
                $errors = array();
                // Loop through $_POST and get the keys
                foreach ($this->input->post() as $key => $value) {
                    // Add the error message for this field
                    $errors[$key] = form_error($key);
                }
                $response['errors'] = array_filter($errors); // Some might be empty
                $response['status'] = FALSE;
            } else {
                $postedArray = $this->input->post(NULL, TRUE);
                $dbData['eventId'] = $eventId;
                $dbData['name'] = $postedArray['name'];
                $dbData['tel'] = $postedArray['tel'];
                $dbData['email'] = $postedArray['email'];
                $dbData['date'] = date('Y-m-d H:i:s');
                if ($this->event_application_model->insert($dbData)) {
                    $response['message'] = '<div class="alert alert-success" >'.lang('application_success').'</div>';
                   
                    $id = $this->uri->segment(2);
                    $post = $this->event_model->getWithLanguage($id, $this->GetLang);
                    
                                
                    $data['contactInfo'] = $this->contactus_model->getContactInfo(1);                    
                    //load email helper
                    $this->load->helper('email');
                    $this->load->library('email');

                    $email_setting = array();
                    $email_setting['useragent']           = "CodeIgniter";
                    $email_setting['mailpath']            = "/usr/sbin/sendmail";
                    $email_setting['protocol']            = "mail";
                    $email_setting['mailtype'] = 'html';
                    $email_setting['charset']  = 'utf-8';
                    $email_setting['newline']  = "\r\n";
                    $email_setting['validate'] = TRUE;
                    $email_setting['wordwrap'] = TRUE;
                    $this->email->initialize($email_setting);

                    $this->email->from('info@mig-academy.com', 'MIG Academy Website');
                   
                    
              
                     
                    $this->email->to($data['contactInfo']->email);

                    $this->email->subject('New Application on '.$post->titleAR.'| MIG Academy Website');
                    $this->email->message('<html>
                               
                    <body>
                        <table>
                        
                            <tbody>
                                <tr>
                                    <td><h4>Name</h4></td>
                                    <td>'.$dbData[''].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Email</h4></td>
                                    <td>'.$dbData['email'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Phone Number</h4></td>
                                    <td>'.$dbData['tel'].'</td>
                                </tr>
                                <tr>
                                    <td><h4>Date</h4></td>
                                    <td>'.$dbData['date'].'</td>
                                </tr>
                                 <tr>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td>This is an automated email sent from MIG Academy Website.</td>
                                </tr>
                            </tbody>
                        </table>
                    </body>
                    </html>');

                    $this->email->send();

                    // echo $this->email->print_debugger();
                    
                    $response['status'] = TRUE;
                } else {
                    $response['message'] = '<div class="alert alert-danger" >'.lang('front_insert_error').'</div>';
                    $response['status'] = FALSE;
                }
            }
        }
        header('Content-type: application/json');
        exit(json_encode($response));
    }

    /*
    cut content
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
    
        //print time arabic
    public function time_arabic($t) {
       $timestamp = strtotime($t);
       $time = date("H",$timestamp);
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        $timeformat= date('g:i',strtotime($t));

        if ($time < "12") {
            return $timeformat ." صباحاً";
        } elseif($time >= "12"){
         return $timeformat ." مساءاً";
        }
        }
    
}

/* End of file events.php */
/* Location: ./application/controllers/events.php */