<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('Product/index');
		$config['total_rows'] = $this->db->count_all('menu');
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['judul'] = 'Product';
		$data['product'] = $this->product_model->get_by_id($config['per_page'], $this->uri->segment(3));
		$this->load->view('templates/header', $data);
		$this->load->view('product/index', $data);
		$this->load->view('templates/footer');
	}


	public function add_product()
	{
		$data['judul'] = 'Create New Product';
		$data['categories'] = $this->product_model->get_category();
		// $data['product'] = $this->product_model->get_by_id();
		$this->load->view('templates/header', $data);
		$this->load->view('product/add_product', $data);
		$this->load->view('templates/footer');
	}

	public function edit_product()
	{
		$data['judul'] = 'Edit Product #1';
		$data['categories'] = $this->product_model->get_category();
		$data['products'] = $this->product_model->get_product();
		// $data['product'] = $this->product_model->get_by_id();
		$this->load->view('templates/header', $data);
		$this->load->view('product/edit_product', $data);
		$this->load->view('templates/footer');
	}

	public function create_new()
	{
		$category = $this->input->post('Category');
		$name = $this->input->post('Name');
		$result = $this->product_model->create_menu($category, $name);
		if ($result) {
			echo 'Insert New Product Succeed!';
		} else {
			echo 'Insert New Product Failed!';
		}
	}

	public function update_menu()
	{
		$id = $this->input->post('hf-id');
		$category_id = $this->input->post('Category');
		$name = $this->input->post('Name');
		$this->product_model->update_product($id, $category_id, $name);
		redirect('product');
	}

	public function delete_product()
	{
		$id = $this->input->post('id');
		$this->db->where('id_menu', $id);
		$query = $this->db->get('po_purchase_meal_dtl');

		if ($query->num_rows() > 0) {
			echo "Cannot delete product because it exists in po_purchase_meal_dtl";
		} else {
			$this->product_model->delete_product($id);
		}
		redirect('product');
	}
}
