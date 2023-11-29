<?php
class Report_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_report($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('po_purchase_meal_hdr');
            return $query->result_array();
        }

        $query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug));
        return $query->row_array();
    }

    public function get_view_report($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('order_hdr');
            return $query->result_array();
        }

        $query = $this->db->get_where('order_hdr', array('id' => $slug));
        return $query->row_array();
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

    public function get_menu_daily_set()
	{
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
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
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
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
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
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
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
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
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
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
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
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
		$this->db->select('po_purchase_meal_dtl.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
		$this->db->from('po_purchase_meal_dtl');
		$this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
		$this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
		$this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
		$this->db->where('id_category', 4);
		$this->db->where('po_purchase_meal_hdr.status', 'active');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function get_detail_report()
    {
        $this->db->select(
            'order_hdr.student_name as student, 
            order_hdr.submitted_date as date,
            po_purchase_meal_dtl.date as week_date'
        );
        $this->db->from('order_hdr');
        $this->db->join('po_purchase_meal_dtl', 'order_hdr.po_purchase_meal_dtl_id = po_purchase_meal_dtl.id');
        $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
        $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
        $query = $this->db->get();
        return $query->result_array();
    }
}