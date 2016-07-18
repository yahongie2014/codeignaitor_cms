<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'courses';

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
                foreach ($where as $field => $value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'desc');
        if (!empty($where) && !is_array($where)) {
            $result = $this->db->get()->row();
        } else {
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function search($where = NULL, $term, $language) {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field => $value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }

        if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {            
            $this->db->like('courses.titleAR', $term);

        } else {            
            $this->db->like('courses.titleGE', $term);

        }

        $this->db->order_by('id', 'desc');
        if (!empty($where) && !is_array($where)) {
            $result = $this->db->get()->row();
        } else {
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getWithLanguage($where = NULL, $language) {
        if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
            $this->db->select('*, titleAR as title, desc200AR as desc200, contentAR as content');
        } else {
            $this->db->select('*, titleGE as title, desc200GE as desc200, contentGE as content');
        }
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field => $value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('id', 'desc');

        if (!empty($where) && !is_array($where)) {
            $result = $this->db->get()->row();
        } else {
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getRelated($where = NULL, $id, $language) {
        if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
            $this->db->select('*, titleAR as title, desc200AR as desc200, contentAR as content');
        } else {
            $this->db->select('*, titleGE as title, desc200GE as desc200, contentGE as content');
        }
        $this->db->from(self::TABLE_NAME);
        $this->db->where('id <>', $id);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field => $value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('addingDate', 'desc');
        $this->db->limit(3);
        if (!empty($where) && !is_array($where)) {
            $result = $this->db->get()->row();
        } else {
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getLimited($where = NULL, $limit, $start = 0, $language) {
        if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
            $this->db->select('*, titleAR as title, desc200AR as desc200, contentAR as content');
        } else {
            $this->db->select('*, titleGE as title, desc200GE as desc200, contentGE as content');
        }
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field => $value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('addingDate', 'desc');
        $this->db->limit($limit, $start);

        $result = $this->db->get()->result();
        // echo $this->db->last_query();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function searchLimited($where = NULL, $term, $limit, $start = 0, $language) {
        if (isset($language) && ($language == 'arabic' || $language == 'german')) {
            $this->db->select('*, titleAR as title, desc200AR as desc200, contentAR as content');
        } else {
            $this->db->select('*, titleGE as title, desc200GE as desc200, contentGE as content');
        }
        $this->db->from(self::TABLE_NAME);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field => $value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }

        if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
            $this->db->like('courses.titleAR', $term);
        } else {
            $this->db->like('courses.titleGE', $term);
        }

        $this->db->order_by('addingDate', 'desc');
        $this->db->limit($limit, $start);

        $result = $this->db->get()->result();
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
        if ($this->db->update(self::TABLE_NAME, $data, $where)) {
            return TRUE;
        } else {
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
