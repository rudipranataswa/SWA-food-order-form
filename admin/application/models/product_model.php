<?php
class Product_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

        public function get_product($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $query = $this->db->get('menu');
                        return $query->result_array();
                }

                $query = $this->db->get_where('menu', array('id' => $slug));
                return $query->row_array();
        }

        public function get_by_id()
        {
                $this->db->select('menu.id, menu.name, category.category');
                $this->db->from('menu');
                $this->db->join('category', 'menu.category_id = category.id');
                $query = $this->db->get();
                return $query->result_array();
        }

        
}
