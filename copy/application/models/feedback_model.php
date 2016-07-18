<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_Model  extends CI_Model
{
	private $id ;

	public function showAllMessages( ) {
		$this->db->select();
		$this->db->from( 'feedback' );
		$this->db->order_by( 'Date' , 'desc');
		$Result = $this->db->get();
		$NumRow = $Result->num_rows() ;
		if ( $NumRow >0 ) {
			$Result     = $Result ->result() ;
			return $Result ;
		}else {  return $NumRow;return FALSE ;}
	}


    public function delete( $id) {
        $this->db->where( 'id', $id);
        $this->db->delete( 'feedback' );
    }

	public function geByid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('feedback');
		return $query->first_row();
	}

    /**
     * Inserts new data into feedback table
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insertContact(Array $data) {
        if ($this->db->insert('feedback', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

}