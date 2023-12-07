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


        public function get_dates($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $this->db->where('status', 'active');
                        $query = $this->db->get('po_purchase_meal_hdr');
                        return $query->result_array();
                }

                $query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug, 'status' => 'active'));
                return $query->row_array();
        }

        public function insert_data()
        {
                $data = array(
                        'email' => $this->input->post('Email'),
                        'student_name' => $this->input->post("Name"),
                        'grade_level' => $this->input->post('Grade'),
                        'parent_phone_number' => $this->input->post("Phone_Number"),
                        'submitted_date' => date('Y-m-d H:i:s')
                );

                $clean_data = $this->security->xss_clean($data);

                $this->db->insert('order_hdr', $clean_data);
        }

        public function get_menu_daily_set()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, menu.id');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 1);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }


        public function get_menu_soup()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 2);
                $this->db->where('po_purchase_meal_hdr.status', 'active');

                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_menu_protein()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 5);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_menu_rice()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 7);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_menu_fruit()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 8);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_menu_pasta()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 3);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_menu_breakfast()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 4);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_holidays()
        {
                $query = $this->db->get('holiday');
                return $query->result_array();
        }

        public function get_child_menus()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, po_purchase_meal_dtl.parent');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('parent !=', 0);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $this->db->order_by('po_purchase_meal_dtl.id_category', 'ASC');
                $query = $this->db->get();
                $result = $query->result_array();

                // Group child menus by parent
                $child_menus = [];
                foreach ($result as $row) {
                        $parent = $row['parent'];
                        unset($row['parent']);  // remove parent from row
                        $child_menus[$parent][] = $row;
                }

                return $child_menus;
        }
}
