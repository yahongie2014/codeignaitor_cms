<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('about_model');
        $this->load->model('about_image_model');
        $this->load->model('about_section_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_index'] = true;
        $this->data['admin_menu_about'] = true;
    }

    public function index() {
        $this->data['page_title'] = lang('about');
        $this->form();
    }

    /**
     * add, edit forms for about
     */
    public function form() {
        $this->data['page_title'] = lang('about');
        $data['returnedData'] = '';

        $id = 1;
        if (!empty($id)) {
            $returnedData = $this->about_model->get($id);
            if(!empty($returnedData)) {
                $returnedData->aboutImages = $this->about_image_model->get(array('aboutId' => $id));
                $sections = $this->about_section_model->get(array('aboutId' => $id));
                if (!empty($sections)) {
                    $i = 0;
                    foreach ($sections as $item) {
                        $i++;
                        $returnedData->{'sectionTitleAR'.$i} = $item->titleAR;
                        $returnedData->{'sectionCaptionAR'.$i} = $item->captionAR;
                        $returnedData->{'sectionDescAR'.$i} = $item->descAR;
                        $returnedData->{'sectionTitleGE'.$i} = $item->titleGE;
                        $returnedData->{'sectionCaptionGE'.$i} = $item->captionGE;
                        $returnedData->{'sectionDescGE'.$i} = $item->descGE;
                    }
                }
            }

            $data['returnedData'] = $returnedData;
        }

        $validation_rules = array(
            array('field' => 'title1AR', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title2AR', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title3AR', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title1GE', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title2GE', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'title3GE', 'label' => lang('title'), 'rules' => 'trim'),
            array('field' => 'titleAR', 'label' => lang('arabic_title'), 'rules' => 'trim|required'),
            array('field' => 'titleGE', 'label' => lang('title').' ('.lang('german').')', 'rules' => 'trim|required'),
            array('field' => 'descAR', 'label' => lang('arabic_content'), 'rules' => 'trim|required'),
            array('field' => 'descGE', 'label' => lang('content'), 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
        }else {
            if($_POST) {
                $postedArray = $this->input->post( NULL, TRUE );
                $aboutData['userId'] = $this->admin_ion_auth->user()->row()->id;
                $aboutData['title1AR'] = $postedArray['title1AR'];
                $aboutData['title2AR'] = $postedArray['title2AR'];
                $aboutData['title3AR'] = $postedArray['title3AR'];
                $aboutData['title1GE'] = $postedArray['title1GE'];
                $aboutData['title2GE'] = $postedArray['title2GE'];
                $aboutData['title3GE'] = $postedArray['title3GE'];
                $aboutData['titleAR'] = $postedArray['titleAR'];
                $aboutData['titleGE'] = $postedArray['titleGE'];

                // post descriptions as it is without filtering
                global $unsanitized_post;

                $aboutData['descAR'] = $unsanitized_post['descAR'];
                $aboutData['descGE'] = $unsanitized_post['descGE'];

                if (!empty($returnedData)) { //update
                    $aboutData['lastModifiedDate'] = date("Y-m-d H:i:s");
                    if ($this->about_model->update($aboutData, $id)) {
                        //sections
                        for ($i=1; $i <= 3; $i++) {
                            $sectionData['titleAR'] = $postedArray['sectionTitleAR'.$i];
                            $sectionData['captionAR'] = $postedArray['sectionCaptionAR'.$i];
                            $sectionData['descAR'] = $postedArray['sectionDescAR'.$i];
                            $sectionData['titleGE'] = $postedArray['sectionTitleGE'.$i];
                            $sectionData['captionGE'] = $postedArray['sectionCaptionGE'.$i];
                            $sectionData['descGE'] = $postedArray['sectionDescGE'.$i];
                            $sectionData['aboutId'] = $id;
                            $sectionId = $i;

                            $this->about_section_model->update($sectionData, $sectionId);
                        }
                        //other images
                        $this->uploadOtherImages($id, $postedArray);
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('update_success_message')."</div>");
                        redirect('admin/about', 'location');
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('update_error')."</div>");
                        redirect('admin/about/form/' . $id, 'location');
                    }
                }//end id
                else {//insert
                    $aboutData['addingDate'] = date("Y-m-d H:i:s");
                    $aboutData['id'] = $id;
                    $this->about_model->insert($aboutData);
                    if ($id) {
                        //sections
                        for ($i=1; $i <= 3; $i++) {
                            $sectionData['titleAR'] = $postedArray['sectionTitleAR'.$i];
                            $sectionData['captionAR'] = $postedArray['sectionCaptionAR'.$i];
                            $sectionData['descAR'] = $postedArray['sectionDescAR'.$i];
                            $sectionData['titleGE'] = $postedArray['sectionTitleGE'.$i];
                            $sectionData['captionGE'] = $postedArray['sectionCaptionGE'.$i];
                            $sectionData['descGE'] = $postedArray['sectionDescGE'.$i];
                            $sectionData['aboutId'] = $id;
                            $sectionData['id'] = $i;

                            $this->about_section_model->insert($sectionData);
                        }
                        //other images
                        $this->uploadOtherImages($id, $postedArray);
                        $this->session->set_flashdata('msg', "<div class='alert alert-success'>".lang('insert_success_message')."</div>");
                    } else {
                        $this->session->set_flashdata('msg', "<div class='alert alert-danger'>".lang('insert_error')."</div>");
                    }
                    redirect('admin/about' , 'location');
                }
            }//post
        }//else
        $this->load->vars($data);
        $this->render('admin/about/form');
    }


    function uploadOtherImages($aboutId, $postedArray) {

        $upload_path = './application/views/images/upload/about/';

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['overwrite'] = false; //Ensuring the filename is unique
        $config['encrypt_name'] = TRUE;
        //upload about images
        $this->load->library('upload');
        $this->load->library('MY_Upload');
        $this->upload->initialize($config);
        if ($this->upload->do_multi_upload("files")) {
            $filesUploaded = $this->upload->get_multi_upload_data();
            $i = 1;
            foreach ($filesUploaded as $file) {
                $i++;
                $file_name = $file['file_name'];

                //insert row into article_images table
                $fileData['aboutId'] = $aboutId;
                $fileData['image'] = $file_name;
                $this->about_image_model->insert($fileData);
            }
        }
    }

    function removeImage() {

        $fileId = $this->uri->segment(4);
        $aboutId = $this->uri->segment(5);
        if ($fileId != "") {

            $imageData = $this->about_image_model->get($fileId);
            if (!empty($imageData)) {
               //remove  file
                $this->about_image_model->delete($fileId);

                $file = 'application/views/images/upload/about/'.$imageData->image;
                // echo $file;  #check if this is the correct path!
                @unlink($file);
            }

            //get images
             $files = $this->about_image_model->get(array('aboutId' => $aboutId));
             $data['otherImages'] = $files;
            //show table
            if($files != 0) {
                echo "   <table>
                              <tr>
                                  <td>".lang('image')."</td>
                                  <td></td>
                              </tr>";
                $i = 0;
                foreach ($files as $file) {
                    $i++;
                    $filename = "application/views/images/upload/about/".$file->image;

                    if ( $file->image !="" && file_exists( "$filename" ) ) {
                        echo '<tr>
                          <td><img src="'. base_url().$filename .'" height="50px"/></td>
                          <td> <a href="javascript:removeImage('.$file->id.','. $aboutId.');" class="btn btn-danger">'. lang('list_delete') .'</a> </td>
                        </tr>';
                    }
                }
                echo '</table>';
            }

        } else {
            return '';
        }
    }
}