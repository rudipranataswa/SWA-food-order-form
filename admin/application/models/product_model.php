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

	public function get_by_id($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('menu.id, menu.name, category.category');
		$this->db->from('menu');
		$this->db->join('category', 'menu.category_id = category.id');
		$query = $this->db->get();
		return $query->result_array();
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

	public function update_product($id, $category_id, $name)
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
		$this->db->where('id', $id);
		$this->db->delete('menu');
	}
}
