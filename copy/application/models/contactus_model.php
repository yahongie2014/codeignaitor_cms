<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus_Model  extends CI_Model
{
	private $id ;

	public function showAllMessages( ) {
		$this->db->select();
		$this->db->from( 'contactus' );
		$this->db->order_by( 'Date' , 'desc');
		$Result = $this->db->get();
		$NumRow = $Result->num_rows() ;
		if ( $NumRow >0 ) {
			$Result     = $Result ->result() ;
			return $Result ;
		}else {  return $NumRow;return FALSE ;}
	}

	public function geByid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('contactus');
		return $query->first_row();
	}

	public function delete( $id) {
		$this->db->where( 'id', $id);
		$this->db->delete( 'contactus' );
	}

	public function getContactInfo($id = 1) {
		$this->db->where( 'id', $id);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get( 'contact_info' );
		return $query->first_row();
	}

	public function getContactInfoForFront($id = 1, $lang) {
		if(!empty($lang) && ($lang == 'arabic' || $lang == 'german')){
			$this->db->select('`contact_info`.*');
		}else{
			$this->db->select('`contact_info`.*');
		}

		$this->db->where( 'id', $id);
		$query = $this->db->get('contact_info');
		return $query->first_row();
	}

    /**
     * Inserts new data into contact_info table
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insertAddress(Array $data) {
        if ($this->db->insert('contact_info', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

	/**
     * Updates selected record in the contact_info
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function updateAddress(Array $data, $where = array()) {
        if (!is_array($where)) {
            $where = array('contact_info.id' => $where);
        }
        $this->db->update('contact_info', $data, $where);
        return $this->db->affected_rows();
    }

    /**
     * Inserts new data into contactus table
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insertContact(Array $data) {
        if ($this->db->insert('contactus', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

}