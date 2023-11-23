<?php
class Category_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_category($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('category');
            return $query->result_array();
        }

        $query = $this->db->get_where('category', array('id' => $slug));
        return $query->row_array();
    }
}
