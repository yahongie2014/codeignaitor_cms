<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'applications';

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
        $this->db->select('applications.*');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('trainees', 'trainees.id = applications.traineeId');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::TABLE_NAME.'.'.self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('applications.id', 'asc');
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

    public function getCoursesApplications($where = NULL) {
        $this->db->select('applications.*,branches.titleAR,applications.id as applicationsId, trainees.name, trainees.email, trainees.phone, trainees.college_work, trainees.placementTest,trainees.branchesId');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('branches', 'branches.id = applications.branchesId','left');
       //$this->db->join('course_branches', 'course_branches.id = trainees.branchesId');
        $this->db->join('trainees', 'trainees.id = applications.traineeId', 'left');
        $this->db->join('courses', 'courses.id = applications.courseId');
        
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::TABLE_NAME.'.'.self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('applications.id', 'asc');
        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else{
            $result = $this->db->get()->result();
        }
        // echo $this->db->last_query();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getPackagesApplications($where = NULL) {
        $this->db->select('applications.*, applications.id as applicationsId, trainees.name, trainees.email, trainees.phone, trainees.college_work, trainees.placementTest,trainees.branchesId');
        $this->db->from(self::TABLE_NAME);
        $this->db->join('trainees', 'trainees.id = applications.traineeId', 'left');
        $this->db->join('packages', 'packages.id = applications.packageId');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::TABLE_NAME.'.'.self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('applications.id', 'asc');
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
        $this->db->select('DISTINCT(applications.id), applications.*');

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
                    $this->db->where('applications.addingDate >=', $terms['dateFrom']);
                }

                if(!empty($terms['dateTo'])) {
                    $this->db->where('applications.addingDate <=', $terms['dateTo']);
                }

                if(!empty($terms['date'])) {
                    $this->db->where('applications.addingDate LIKE ', '%'.$terms['date'].'%');
                }

                if(!empty($terms['month'])) {
                    $this->db->where('MONTH(applications.addingDate)', $terms['month']);
                }

                if(!empty($terms['year'])) {
                    $this->db->where('Year(applications.addingDate)', $terms['year']);
                }

           }
        }

        $this->db->order_by('applications.id', 'desc');
        if(!empty($where) && !is_array($where)) {
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