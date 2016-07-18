<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'blog';

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
    public function get($where = NULL, $language = NULL) {
        if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
         $this->db->select('*, titleAR as title, descAR as description, autherAR as auther');
            } else {
                $this->db->select('*, titleGE as title, descGE as description,autherGE as auther');
            }

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
        $this->db->order_by('addingDate', 'desc');

        if(!empty($where) && !is_array($where)){
            $result = $this->db->get()->row();
        }
        else {
            $result = $this->db->get()->result();
        }
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getLimited($where = NULL, $limit, $start = 0, $language = NULL) {
         if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
     $this->db->select('*, titleAR as title, descAR as description, autherAR as auther');
            } else {
                $this->db->select('*, titleGE as title, descGE as description,autherGE as auther');
            }
        
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

    public function getByTagIdLimited($where = NULL, $limit, $start = 0, $language = NULL) {
 if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
     $this->db->select('blog.*, blog.titleAR as title, blog.descAR as description,autherAR as auther');
            } else {
                $this->db->select('blog.*, blog.titleGE as title, blog.descGE as description,autherGE as auther');
            }
       
        $this->db->join('na_tags', 'na_tags.newsArticleId = blog.id', 'left');
        $this->db->join('tags', 'na_tags.tagId = tags.id', 'left');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('tags.type', 'blog');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
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

      function getBlogs( $limit = null, $offset = null )
  {
    $this->db->from(self::TABLE_NAME);
    $this->db->order_by( "id", "desc" );
    $this->db->limit( $limit, $offset );
    $result = $this->db->get()->result();
    return $result;
  }
  
    public function getByTagId($where = NULL, $language = NULL) {
 if (isset($language) && ($language == 'arabic' || $language == 'arabic')) {
     $this->db->select('blog.*, blog.titleAR as title, blog.descAR as description,,autherAR as auther');
            } else {
                $this->db->select('blog.*, blog.titleGE as title, blog.descGE as description,,autherGE as auther');
            }
       
        $this->db->join('na_tags', 'na_tags.newsArticleId = blog.id', 'left');
        $this->db->join('tags', 'na_tags.tagId = tags.id', 'left');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('tags.type', 'blog');
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $this->db->order_by('addingDate', 'desc');

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
        else {
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
        //delete image
        $this->db->select('image');
        $this->db->from(self::TABLE_NAME);
        if (!is_array($where)) {
            $where = array(self::PRI_INDEX => $where);
        }

        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
          $res = $query->row();
          $file = 'application/views/images/upload/blog/'.$res->image;
          // echo $file;  #check if this is the correct path!
          @unlink($file);
        }

        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }
}