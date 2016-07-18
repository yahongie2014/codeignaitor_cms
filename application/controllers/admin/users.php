<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->model('user_model');
        $this->data['css'] = $this->Style_Sheet;
        $this->data['admin_menu_system'] = true;
        $this->data['admin_menu_settings'] = true;
        $this->data['admin_menu_users'] = true;
    }

    //Show users
    public function index() {

        $this->data['page_title'] = lang( 'users' );
        $this->data['admin_menu_users_show'] = true;

        //permissions
        $groups = array('admin', 'system');
        if (!$this->admin_ion_auth->in_group($groups)) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $groupId = $this->uri->segment(4);
        if(!empty($groupId)) {
            $data['groupId'] = $groupId;

            if($groupId  != 'all') {
                $users = $this->admin_ion_auth->users(array($groupId))->result();
            }
            elseif($groupId  == 'all') {
                //data entry team members
                $users = $this->admin_ion_auth->users(array(1,2,3))->result();
            }
        }
        else {
            //list all users
            $users = $this->admin_ion_auth->users(array(1,2,3))->result();
        }


        if(!empty($users)) {
            foreach ($users as $k => $user) {
                $users[$k]->groups = $this->admin_ion_auth->get_users_groups($user->user_id)->result();
            }
        }
        $data['users'] = $users;
        $this->load->vars($data);
        $this->render('admin/users/show');
    }

    function delete()
    {
        //permissions
        $groups = array('admin', 'system');
        if (!$this->admin_ion_auth->in_group($groups)) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $userId = (int) $this->uri->segment(4);
        if (!empty($userId)) {
            $groupId = $this->admin_ion_auth->get_users_groups($userId)->row()->id;
            //delete users
            $this->admin_ion_auth->delete_user($userId)  ;
            redirect('admin/users/index/'.$groupId, 'location');
        } else {
            redirect('admin/users/index', 'location');
        }
    }

     function deleteMultiple()
    {
        //permissions
        $groups = array('admin', 'system');
        if (!$this->admin_ion_auth->in_group($groups)) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $choosedItemArr = $_POST['choosedItem'];
        if (count($choosedItemArr) > 0) {

            foreach ($choosedItemArr as $userId) {
                //delete users
                $this->admin_ion_auth->delete_user($userId) ;
            }
        }
        redirect('admin/users/index', 'location');
    }

    //add user
    public function add() {
        $this->data['admin_menu_users_add'] = true;
        $this->data['page_title'] = lang( 'add_user' );

        //permissions
        $groups = array('admin', 'system');
        if (!$this->admin_ion_auth->in_group($groups)) {
            //redirect them to the home page
            redirect('admin/index', 'refresh');
        }

        $groupId = $this->uri->segment(4);
        if(!empty($groupId)) {
            $this->data['groupId'] = $groupId;

            $data['refferedPage'] = 'admin/users/index/'.$groupId;

            //validate form input
            $this->form_validation->set_rules('username', lang('User_Name'), 'required|xss_clean|callback_check_username');
            $this->form_validation->set_rules('first_name', lang('firstName'), 'required|xss_clean');
            $this->form_validation->set_rules('last_name', lang('lastName'), 'required|xss_clean');
            $this->form_validation->set_rules('email', lang('Email'), 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'admin_ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'admin_ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('Password_confirm'), 'required');

            if($this->GetLang == 'ar') {
                $this->form_validation->set_message('is_unique', 'حقل %s مستخدم من قبل');
            }
            else {
                $this->form_validation->set_message('is_unique', 'The %s is already taken');
            }

            if ($this->form_validation->run() == true) {
                $username = strtolower($this->input->post('username'));
                $email    = strtolower($this->input->post('email'));
                $password = $this->input->post('password');

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name')
                );
            }

            if ($this->form_validation->run() == true)
            {
                $this->admin_ion_auth->register_without_activation($username, $password, $email, $additional_data, array($groupId));
                //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('message', $this->admin_ion_auth->messages());
                redirect('admin/users/index/'.$groupId, 'location');
            }
            else
            {
                //display the create user form
                //set the flash data error message if there is one
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
                $this->data['message'] =  ($this->admin_ion_auth->errors() ? $this->admin_ion_auth->errors() : $this->session->flashdata('message'));
                $this->data['username'] = array(
                    'name'  => 'username',
                    'id'    => 'username',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'placeholder' => lang('User_Name'),
                    'value' => $this->form_validation->set_value('username'),
                );
                $this->data['first_name'] = array(
                    'name'  => 'first_name',
                    'id'    => 'first_name',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'placeholder' => lang('firstName'),
                    'value' => $this->form_validation->set_value('first_name'),
                );
                $this->data['last_name'] = array(
                    'name'  => 'last_name',
                    'id'    => 'last_name',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'placeholder' => lang('lastName'),
                    'value' => $this->form_validation->set_value('last_name'),
                );
                $this->data['email'] = array(
                    'name'  => 'email',
                    'id'    => 'email',
                    'type'  => 'text',
                    'class' => 'form-control',
                    'placeholder' => lang('Email'),
                    'value' => $this->form_validation->set_value('email'),
                );
                $this->data['password'] = array(
                    'name'  => 'password',
                    'id'    => 'password',
                    'type'  => 'password',
                    'class' => 'form-control',
                    'placeholder' => lang('Password'),
                    'value' => $this->form_validation->set_value('password'),
                );
                $this->data['password_confirm'] = array(
                    'name'  => 'password_confirm',
                    'id'    => 'password_confirm',
                    'type'  => 'password',
                    'class' => 'form-control',
                    'placeholder' => lang('Password_confirm'),
                    'value' => $this->form_validation->set_value('password_confirm'),
                );

                $this->load->vars($this->data);
                $this->render('admin/users/add');
            }
        }
    }

    public function update() {
        $this->data['admin_menu_users_show'] = true;
        $userID = $this->uri->segment(4);

        if(!empty($userID))
        {
            $currentUserId = $this->admin_ion_auth->user()->row()->id;

            if($this->admin_ion_auth->in_group('secretary', 'website')) {
                //if he is the logged in user
                if(!empty($currentUserId) && $currentUserId == $userID) {

                } else {
                    redirect('admin/index', 'location');
                }
            }
            //set session
            $this->session->set_userdata( array('userID' => $userID));

            $userData = $this->admin_ion_auth->user($userID)->row();
            $this->data['userData'] = $userData;
            if(!empty($userData))
            {
                //get user groupId
                $groupId = $this->admin_ion_auth->get_users_groups($userID)->row()->id;
                $data['refferedPage'] = 'admin/users/index/'.$groupId;

                //validate form input
                $this->form_validation->set_rules('username', lang('User_Name'), 'required|xss_clean|callback_check_username_edit');
                $this->form_validation->set_rules('first_name', lang('firstName'), 'required|xss_clean');
                $this->form_validation->set_rules('last_name', lang('lastName'), 'required|xss_clean');
                $this->form_validation->set_rules('email', lang('Email'), 'required|valid_email|callback_check_mail_edit');
                $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'admin_ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'admin_ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('Password_confirm'), 'required');

                if($this->GetLang == 'ar') {
                    $this->form_validation->set_message('is_unique', 'حقل %s مستخدم من قبل');
                }
                else {
                    $this->form_validation->set_message('is_unique', 'The %s is already taken');
                }

                if ($this->form_validation->run() == true) {
                    $new_data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name'  => $this->input->post('last_name'),
                        'username' => strtolower($this->input->post('username')),
                        'email'    => strtolower($this->input->post('email')),
                        'password' => $this->input->post('password')
                    );
                }

                if ($this->form_validation->run() == true)
                {
                    $this->admin_ion_auth->update($userID, $new_data);
                    //check to see if we are creating the user
                    //redirect them back to the admin page
                    $this->session->set_flashdata('message', $this->admin_ion_auth->messages());
                    redirect('admin/users/index/'.$groupId, 'location');
                }
                else
                {
                    //display the create user form
                    //set the flash data error message if there is one
                    $this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');
                    $this->data['message'] = ($this->admin_ion_auth->errors() ? $this->admin_ion_auth->errors() : $this->session->flashdata('message'));
                    $this->data['username'] = array(
                        'name'  => 'username',
                        'id'    => 'username',
                        'type'  => 'text',
                        'class' => 'form-control',
                        'placeholder' => lang('User_Name'),
                        'value' => $userData->username,
                    );
                    $this->data['first_name'] = array(
                        'name'  => 'first_name',
                        'id'    => 'first_name',
                        'type'  => 'text',
                        'class' => 'form-control',
                        'placeholder' => lang('firstName'),
                        'value' => $userData->first_name,
                    );
                    $this->data['last_name'] = array(
                        'name'  => 'last_name',
                        'id'    => 'last_name',
                        'type'  => 'text',
                        'class' => 'form-control',
                        'placeholder' => lang('lastName'),
                        'value' => $userData->last_name,
                    );
                    $this->data['email'] = array(
                        'name'  => 'email',
                        'id'    => 'email',
                        'type'  => 'text',
                        'class' => 'form-control',
                        'placeholder' => lang('Email'),
                        'value' => $userData->email,
                    );
                    $this->data['password'] = array(
                        'name'  => 'password',
                        'id'    => 'password',
                        'type'  => 'password',
                        'class' => 'form-control',
                        'placeholder' => lang('Password'),
                    );
                    $this->data['password_confirm'] = array(
                        'name'  => 'password_confirm',
                        'id'    => 'password_confirm',
                        'type'  => 'password',
                        'class' => 'form-control',
                        'placeholder' => lang('Password_confirm'),
                    );

                    $this->load->vars($this->data);
                    $this->render('admin/users/edit');
                }
            }
        }
    }

    public function check_mail($email) {

        $adminData = $this->admin_ion_auth->user()->row();
        if(!empty($adminData)) {
            if ($this->admin_ion_auth->email_check($email)) {
                $this->form_validation->set_message(
                        'check_mail', lang('email_used_message')
                );

                if ($email == $adminData->email) {
                    return true;
                } else {

                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function check_mail_edit($email) {

        $userID = $this->session->userdata('userID');
        if(!empty($userID)) {
            $userData = $this->user_model->get_user($userID);
            $is_exist = $this->user_model->isEmailExist($email);

            if ($is_exist) {
                $this->form_validation->set_message(
                        'check_email_edit', lang('email_used_message')
                );
                if (!empty($userData) && $email == $userData->email) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
        else {
            return false;
        }
    }

    public function check_username($username) {
        $this->load->library('form_validation');
        $is_exist = $this->user_model->isUserNameExist($username);
        if ($is_exist) {
            $this->form_validation->set_message(
                    'check_username', lang('username_used_message')
            );
            return false;
        } else {
            return true;
        }
    }

    public function check_username_edit($username) {

        $userID = $this->session->userdata('userID');
        if(!empty($userID)) {
            $userData = $this->user_model->get_user($userID);
            $is_exist = $this->user_model->isUserNameExist($username);

            if ($is_exist) {
                $this->form_validation->set_message(
                        'check_username_edit', lang('username_used_message')
                );
                if (!empty($userData) && $username == $userData->username) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
        else {
            return false;
        }
    }
}