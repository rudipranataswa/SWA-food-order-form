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

        public function paginate($limit, $start)
        {
                $this->db->limit($limit, $start);        
                $this->db->select('menu.id as menu_id, menu.name, category.category');
                $this->db->from('menu');
                $this->db->join('category', 'menu.category_id = category.id');
                // $this->db->where('menu.id', $id);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        public function get_by_id($id)
        {
                // $this->db->limit($limit, $start);
                $this->db->select('menu.id as menu_id, menu.name, category.category');
                $this->db->from('menu');
                $this->db->join('category', 'menu.category_id = category.id');
                $this->db->where('menu.id', $id);
                $query = $this->db->get();
                return $query->row_array();
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

        public function create_menu($category, $name)
        {
                $data = array(
                        'category_id' => $category,
                        'name' => $name
                );

                return $this->db->insert('menu', $data);
        }

        public function update_menu($id, $category_id, $name)
        {
                $data = array(
                        'category_id' => $category_id,
                        'name' => $name,
                );

                $this->db->where('id', $id);
                return $this->db->update('menu', $data);
        }

        public function delete_product($id)
        {
                // $this->db->where('id', $id);
                // $this->db->delete('menu');
                $this->db->where('id_menu', $id);
                $query = $this->db->get('po_purchase_meal_dtl');

                if ($query->num_rows() == 0) {
                $this->db->where('id', $id);
                $this->db->delete('category');
                return true;
                } else {
                return 'Fail: Cannot edit category because it exists in po_purchase_meal_dtl';
                }
        } 
}
