<?php
class Po_meal_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	// Get PO Meal Header Data
	public function get_po_meal($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->get('po_purchase_meal_hdr');
			return $query->result_array();
		}

		$query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug));
		return $query->row_array();
	}

	// Get Daily Set Data
	public function get_daily_set()
	{
		$this->db->where('category_id', 1);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	// Get Pasta Data
	public function get_pasta()
	{
		$this->db->where('category_id', 3);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	// Get Breakfast Data
	public function get_breakfast()
	{
		$this->db->where('category_id', 4);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	// Get All Menu Data
	public function get_menus()
	{
		$this->db->select('id, name, category_id');
		$this->db->from('menu');
		$this->db->where_in('category_id', array(2, 5, 7, 8));
		$query = $this->db->get();
		return $query->result_array();
	}

	// Add New Data to PO Header
	public function insertData($data)
	{
		// Dapatkan semua id yang ada
		$query = $this->db->query('SELECT id FROM po_purchase_meal_hdr ORDER BY id');
		$result = $query->result_array();
		$existing_ids = array_column($result, 'id');

		// Cari id terkecil yang belum digunakan
		$id = 1;
		while (in_array($id, $existing_ids)) {
			$id++;
		}

		// Gunakan id tersebut untuk data baru
		$data['id'] = $id;

		$this->db->insert('po_purchase_meal_hdr', $data);
		return $this->db->insert_id();
	}

	// Add new Meal to PO Detail by PO Header
	public function insertMeal($data)
	{
		$query = $this->db->query('SELECT MAX(id) as maxid FROM po_purchase_meal_dtl');
		$result = $query->row();
		$max_id = $result->maxid;
		$data['id'] = $max_id + 1;

		$this->db->insert('po_purchase_meal_dtl', $data);
	}

	// Get data by po header id for edit data
	public function get_by_id($inserted_id_hdr)
	{
		$this->db->select('remark, begin_date, end_date, status');
		$this->db->from('po_purchase_meal_hdr');
		$this->db->where('id', $inserted_id_hdr);
		$query = $this->db->get();
		return $query->row_array();
	}

	// Get po data detail by id for edit data
	public function get_details_by_id($id_hdr)
	{
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, po_purchase_meal_dtl.id_menu, po_purchase_meal_dtl.date');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->where('po_purchase_meal_dtl.id_po_purchase_meal_hdr', $id_hdr);
		$query = $this->db->get();
		return $query->result();
	}

	// Model for delete po head and detail data
	public function delete_po_meal($id)
    {
        $this->db->where('status', 'ACTIVE');
        $this->db->where('id', $id);
        $query = $this->db->get('po_purchase_meal_hdr');

        if ($query->num_rows() == 0) {
            $this->db->where('id', $id);
            $this->db->delete('po_purchase_meal_hdr');
            return true;
        } else {
            return 'The following po meal cannot be deleted as it is active';
        }
    }
	// public function deleteData($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('po_purchase_meal_hdr');

	// 	$this->db->where('id_po_purchase_meal_hdr', $id);
	// 	$this->db->delete('po_purchase_meal_dtl');
	// }
}
