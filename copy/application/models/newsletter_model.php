<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model  extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

	public function showAllNewsletter( ) {
		$this->db->select();
		$this->db->from( 'newslsubsc' );
		$this->db->order_by( 'date' );
		$Result = $this->db->get();
		$NumRow = $Result->num_rows() ;
		if ( $NumRow >0 ) {
			$Result     = $Result ->result() ;
			return $Result ;
		}else {  return $NumRow; return FALSE ;}
	}

	public function getEmails( ) {
		$this->db->select('email');
		$this->db->from( 'newslsubsc' );
		$this->db->order_by( 'date' );
		$Result = $this->db->get();
		$NumRow = $Result->num_rows() ;
		if ( $NumRow >0 ) {
			$Result     = $Result ->result() ;
			return $Result ;
		}else {  return $NumRow; return FALSE ;}
	}

	public function delete_newsletter( $ID_news) {
		$this->db->where( 'id', $ID_news );
		$this->db->delete( 'newslsubsc' );
	}

 	public function setNewsL ($data)
	{
	   $today = date('Y-m-d');
       extract($data);
       $data = array('email' => $data['news_mail'], 'name' => $data['name'], 'date' => $today);
       if($this->db->insert('newslsubsc', $data)){return true;}else{ return false;}
    }
}
/* End of file newsletter_model.php */
/* Location: ./application/models/newsletter_model.php */