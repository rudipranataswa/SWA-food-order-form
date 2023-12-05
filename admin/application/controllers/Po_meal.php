<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_meal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('po_meal_model');
	}

	public function index()
	{
		$data['judul'] = 'PO Purchase Meal';
		$data['po_meal'] = $this->po_meal_model->get_po_meal();
		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/index');
		$this->load->view('templates/footer');
	}

	public function add_po_meal()
	{
		$data['judul'] = 'Create New PO Purchase Meal';
		// $data['po_meal'] = $this->po_meal_model->get_po_meal();
		$data['dailyset'] = $this->po_meal_model->get_daily_set();
		$data['pastas'] = $this->po_meal_model->get_pasta();
		$data['breakfasts'] = $this->po_meal_model->get_breakfast();
		$data['menus'] = $this->po_meal_model->get_menus();
		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/add_po_meal', $data);
		$this->load->view('templates/footer');
	}

	public function edit_po_meal()
	{
		$data['judul'] = 'Edit PO Purchase Meal #1';
		// $data['po_meal'] = $this->po_meal_model->get_po_meal();
		$this->load->view('templates/header', $data);
		$this->load->view('po_meal/edit_po_meal');
		$this->load->view('templates/footer');
	}

	public function submit()
	{
		$data = array(
			'remark' => $this->input->post('Title'),
			'begin_date' => $this->input->post('Begin'),
			'end_date' => $this->input->post('End'),
			'status' => $this->input->post('Status')
		);
		$this->po_meal_model->insert_data($data);
	}
}
