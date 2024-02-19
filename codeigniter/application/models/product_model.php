<?php
class Product_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

        // Model for get Menu data
        public function get_product($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $query = $this->db->get('menu');
                        return $query->result_array();
                }

                $query = $this->db->get_where('menu', array('id' => $slug));
                return $query->row_array();
        }

        // Model for Menu Index View Data
        public function paginate($limit, $start, $keyword = null) //
        {
                $this->db->limit($limit, $start);
                $this->db->select('menu.id, menu.name, category.category, category.id as cat_id');
                $this->db->from('menu');
                $this->db->join('category', 'menu.id_category = category.id');
                // if($category){
                //         $this->db->where('id_category', $category);
                // }
                if($keyword){
                        $this->db->like('name', $keyword);
                }
                $query = $this->db->get();
                return $query->result_array(); //'menu', $limit, $start, $keyword
        } 

        // Model for get all category data
        public function get_category()
        {
                $this->db->select('*');
                $this->db->from('category');
                $query = $this->db->get();
                return $query->result_array();
        }

        // Model for get status which is active in po header
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

        // Model for get admin fullname
        public function get_admin_id($fullname)
        {
                $this->db->select('id');
                $this->db->from('admin');
                $this->db->where('fullname', $fullname);
                $query = $this->db->get();

                // Check if a result is returned
                if ($query->num_rows() > 0) {
                        $result = $query->row();
                        return $result->id;
                } else {
                        return null; // or handle this case as you see fit
                }
        }

        // Model for Add Menu Data
        public function create_menu($category, $name, $admin_id)
	{
                $this->db->select_max('id');
                $result = $this->db->get('menu')->row();
                $highest_id = $result->id;
                $new_id = $highest_id + 1;
                $session_data = $this->session->userdata('logged_in');
                $data = array(
                        'category_id' => $category,
                        'name' => $name,
                        'id' => $new_id,
                        'created_by' => $admin_id,
                        'created_date' => date('Y-m-d H:i:s', strtotime('+6 hours'))
                );

                return $this->db->insert('menu', $data);
	}

        // Model for Edit Menu Data
	public function update_menu($id, $category_id, $name, $admin_id)
	{
		$data = array(
                        'category_id' => $category_id,
			'name' => $name,
                        'modified_by' => $admin_id,
                        'modified_date' => date('Y-m-d H:i:s', strtotime('+6 hours'))
                );

                $this->db->where('id', $id);
		return $this->db->update('menu', $data);
	}

        // Model for Delete menu Data
	public function delete_menu($id)
	{
                $this->db->where('id', $id);
                $query = $this->db->get('po_purchase_meal_dtl');
                
                if ($query->num_rows() == 0) {
                        $this->db->where('id', $id);
                        $this->db->delete('menu');
                        
                        return true;
                } else {
                        return 'Fail: Cannot edit category because it exists in po_purchase_meal_dtl';
                }
	}
}
