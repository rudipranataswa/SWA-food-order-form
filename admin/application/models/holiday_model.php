<?php
class Holiday_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_holiday($slug = FALSE)
    {
        if ($slug === FALSE) {
                $query = $this->db->get('holiday');
                return $query->result_array();
        }

        $query = $this->db->get_where('holiday', array('id' => $slug));
        return $query->row_array();
    }

}