<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trainee_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'trainees';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'id';

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'asc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getDesc($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'desc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function getExtend($where = NULL) {
        $this->db->select('trainees.*, applications.*');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('applications', 'applications.traineeId = trainees.id');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::TABLE_NAME.'.'.self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('trainees.addingDate', 'desc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getRow($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'asc');
        $result = $this->db->get()->first_row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getRowExtend($where = NULL) {
        $this->db->select('trainees.*');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('applications', 'applications.traineeId = trainees.id', 'left');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'asc');
        $result = $this->db->get()->first_row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function getArray($where = NULL) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'asc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        $trainees = array();
        if ($result) {
            if (!empty($where) && !is_array($where)) {
                    $trainees[] = array(
                       'id'   => $result->id,
                       'text' => $result->name,
                    );
            } else{

                foreach ($result as $item) {
                    $trainees[] = array(
                       'id'   => $item->id,
                       'text' => $item->name,
                    );
                }
            }
            return $trainees;
        } else {
            return false;
        }
    }

    public function getApplications($where = NULL) {
        $this->db->select('trainees.*, applications.*');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('applications', 'applications.traineeId = trainees.id', 'left');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::TABLE_NAME.'.'.self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('trainees.id', 'asc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getPendingApplications($where = NULL) {
        $this->db->select('trainees.*, applications.*');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('applications', 'applications.traineeId = trainees.id', 'left');
        $this->db->where('status', 'pending');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::TABLE_NAME.'.'.self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('trainees.addingDate', 'desc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


    public function searchReports($where = NULL, $terms = NULL) {
        $this->db->select('DISTINCT(trainees.id), trainees.*');

        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            }

        }

        if ($terms !== NULL) {
            if (is_array($terms)) {
                if(!empty($terms['dateFrom'])) {
                    $this->db->where('trainees.addingDate >=', $terms['dateFrom']);
                }

                if(!empty($terms['dateTo'])) {
                    $this->db->where('trainees.addingDate <=', $terms['dateTo']);
                }

                if(!empty($terms['month'])) {
                    $this->db->where('MONTH(trainees.addingDate)', $terms['month']);
                }

                if(!empty($terms['year'])) {
                    $this->db->where('Year(trainees.addingDate)', $terms['year']);
                }


           }
        }

        $this->db->order_by('trainees.id', 'desc');
        if(!empty($terms) && !is_array($terms)) {
            $result = $this->db->get()->row();
        }
        else {
            $result = $this->db->get()->result();
        }
        // echo $this->db->last_query();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Inserts new data into database
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insert(Array $data) {
        if ($this->db->insert(self::TABLE_NAME, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    /**
     * Updates selected record in the database
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function update(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
        if($this->db->update(self::TABLE_NAME, $data, $where)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {
        if (!is_array($where)) {
            $where = array(self::PRI_INDEX => $where);
        }
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }
}