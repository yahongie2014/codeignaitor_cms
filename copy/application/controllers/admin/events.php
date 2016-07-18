<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Events extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_moo');
        $this->load->model('event_model');
        $this->load->model( "event_application_model" );
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_events'] = true;
    }

    //Show events
    public function index() {
        $this->data['page_title'] = lang( 'events' );
        $events = $this->event_model->getWithLanguage(NULL, $this->GetLang);
        if(!empty($events)){
            foreach ($events as $item) {
                $item->username = $this->admin_ion_auth->user($item->userId)->row()->username;
                $item->applications = $this->event_application_model->get(array('eventId' => $item->id));
            }
        }
        $data['events'] = $events;

        $this->load->vars($data);
        $this->render('admin/events/show');
    }

    /**
     * Add, Edit event
     */
    public function form() {
        $this->data['page_title'] = lang( 'events' );
        $data['returnedData'] = '';
        $latitude = '30.0096557';
        $lagitude = '31.1889511';

        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            $returnedData = $this->event_model->get($id);
            if(!empty($returnedData)){
                $latitude = $returnedData->latitude;
                $lagitude = $returnedData->lagitude;
            }
            $data['returnedData'] = $returnedData;
        }

        $data['latitude'] = $latitude;
        $data['lagitude'] = $lagitude;

        ////////////
        //draw the map
        $this->load->library('googlemaps');
        $config['center'] = $latitude.', '.$lagitude;//latitude, lagitude of the company in google maps
        $config['zoom'] = '14';//'auto';
        $this->googlemaps->initialize($config);

        $marker['position'] =  $latitude.', '.$lagitude;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        ///////////////////////

        $validation_rules = array(
            array('field' => 'titleAR', 'label' => lang('title').' ('.lang('arabic').')', 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'contentAR', 'label' => lang('content').' ('.lang('arabic').')', 'rules' => 'trim|required'),
            array('field' => 'contentGE', 'label' => lang('content').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'date', 'label' => lang('date'), 'rules' => 'trim|required'),
            array('field' => 'startTime', 'label' => lang('startTime'), 'rules' => 'trim|required'),
            array('field' => 'endTime', 'label' => lang('endTime'), 'rules' => 'trim|required'),
            array('field' => 'locationAR', 'label' => lang('Location').' ('.lang('arabic').')', 'rules' => 'trim|required'),
            array('field' => 'locationGE', 'label' => lang('Location').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'latitude', 'label' => lang('latitude'), 'rules' => 'trim|required'),
            array('field' => 'lagitude', 'label' => lang('lagitude'), 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST)
            {
                $postedArray = $this->input->post( NULL, TRUE );
                $postedArray['userId'] = $this->admin_ion_auth->user()->row()->id;

                if(!empty($postedArray['startTime'])){
                    // 12-hour time to 24-hour time
                    $time_in_24_hour_format  = date("H:i", strtotime($postedArray['startTime']));
                    $postedArray['startTime'] = $time_in_24_hour_format;
                }

                if(!empty($postedArray['endTime'])){
                    // 12-hour time to 24-hour time
                    $time_in_24_hour_format  = date("H:i", strtotime($postedArray['endTime']));
                    $postedArray['endTime'] = $time_in_24_hour_format;
                }

                $upload_path = './application/views/images/upload/events/';
                $height = 600;
                $width = 500;

                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $field_name = "image";
                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload("image")) {

                        //get new image name
                        $uploaded_image = $this->upload->file_name;
                        //resize image
                        $this->image_moo->load($upload_path.$uploaded_image)->resize($height,$width)->save($upload_path.$uploaded_image,true);

                        $postedArray['image'] = $uploaded_image;

                        if(!empty($returnedData)){
                            //delete old image
                            $file = $upload_path.$event->image;
                            @unlink($file);
                        }
                    } else {
                        $this->session->set_flashdata('msg_class', 'alert alert-danger');
                        $this->session->set_flashdata('msg', lang('update_error').' '.$this->upload->display_errors());
                        redirect('admin/event/form/'. $id, 'location');
                    }
                }

                if (!empty($id)) { //update event
                    $postedArray['lastModifiedDate'] = date("Y-m-d H:i:s");
                    if ($this->event_model->update($postedArray, $id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/events', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/events/form/' . $id, 'location');
                    }
                }
                else {//insert event
                    $postedArray['addingDate'] = date("Y-m-d H:i:s");
                    $id = $this->event_model->insert($postedArray);
                    if (!empty($id)) {
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                        redirect('admin/events', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                        redirect('admin/events', 'location');
                    }
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/events/form');
    }

    public function applications() {
        $data['courseName'] = '';
        $eventId = $this->uri->segment(4);
        if(!empty($eventId)) {
            $this->data['page_title'] = lang('applications');
            $returnedData = $this->event_application_model->get(array('eventId' => $eventId));
            if(!empty($returnedData)){
                foreach ($returnedData as $item) {
                    if (!empty($item->eventId)) {
                        $eventData = $this->event_model->getWithLanguage($item->eventId, $this->GetLang);
                        if(!empty($eventData)) {
                            $item->eventName = $eventData->title;
                            $data['eventName'] = $item->eventName;
                        }
                    }
                }
            }
            $data['returnedData'] = $returnedData;

            $this->load->vars($data);
            $this->render('admin/events/applications');
        } else {
            redirect('admin/events', 'location');
        }

    }

    function delete()
    {
        $id = (int) $this->uri->segment(4);
        if (!empty($id)) {
            //delete event
            $this->event_model->delete($id);
            $this->event_application_model->delete(array('eventId' => $id));
            redirect('admin/events', 'location');
        }
    }
}