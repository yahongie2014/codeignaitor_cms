<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    protected $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
    }

    /**
     * Custom select input validation
     */
    public function check_default($post_string)
    {
        if($post_string == '#'){
            $this->CI->form_validation->set_message('check_default', lang('choose'));
            return FALSE;
        }else {
            return TRUE;
        }
    }

    /**
     * Custom URL validation
     */
    public function valid_url_format($str){

        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            if($str!='') {
                $this->CI->form_validation->set_message('valid_url_format', lang('url_error'));
                return FALSE;
            }else {
                return TRUE;
            }
        }
        return TRUE;
    }

}