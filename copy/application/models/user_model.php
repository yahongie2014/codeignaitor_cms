<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    var $title = '';
    var $content = '';
    var $date = '';
    private $usersTable = "users";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_user($id) {
        $query = $this->db->get_where($this->usersTable, array('id' => $id,
            'active' => '1'));
        return $query->row();
    }

    public function get_user_breadcrumb($id = NULL)
    {
        $this->db->select('id, (first_name+" "+last_name) as title');
        $this->db->limit(1);
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'users' );
        return $query->result();
    }

    function get_users() {
        $query = $this->db->get_where($this->usersTable, array('active' => '1'));
        return $query->result();
    }

    function get_inactive_users() {
        $query = $this->db->get_where($this->usersTable, array('active' => '0'));
        return $query->result();
    }

    function insert_user($new_data) {
        $data = array(
            'ip_address' => '00000',
            'username' => $new_data['username'],
            'password' => $new_data['password'],
            'first_name' => $new_data['first_name'],
            'last_name' => $new_data['last_name'],
            'email' => $new_data['email'],
            'created_on' => '111',
            'active' => 1
        );
        $this->db->insert('users', $data);
        $userId = $this->db->insert_id();
        if(isset($userId) && $userId)
        {
            //insert into users_groups table
            $users_groups_data['user_id'] = $userId;
            $users_groups_data['group_id'] = $new_data['group_id'];
            $this->db->insert('users_groups', $users_groups_data);
        }
        return $userId;
    }

    function isEmailExist($email) {
        $this->db->select('id');
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     function isUserNameExist($username) {
        $this->db->select('id');
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}