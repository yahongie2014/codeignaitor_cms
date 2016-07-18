<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Events extends Front_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('event_model');
        $this->load->model( "event_application_model" );
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
}

/* End of file events.php */
/* Location: ./application/controllers/events.php */