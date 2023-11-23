<?php
class Po_meal_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_po_meal($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('po_purchase_meal_hdr');
            return $query->result_array();
        }

        $query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug));
        return $query->row_array();
    }
}