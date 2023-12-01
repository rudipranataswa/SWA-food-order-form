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

	public function get_daily_set()
	{
		$this->db->where('category_id', 1);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	public function get_pasta()
	{
		$this->db->where('category_id', 3);
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	public function get_breakfast()
	{
		$this->db->where('category_id', 4);
		$query = $this->db->get('menu');
		return $query->result_array();
	}
}
