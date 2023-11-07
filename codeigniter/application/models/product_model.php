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

                $this->db->insert('order_hdr', $data);
        }
}
