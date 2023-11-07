<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('url_helper');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('user_agent');
		$this->load->library('session');
	}

	public function index()
	{
		$data = array(
			'product_item' => $this->product_model->get_product(),
			'dates' => $this->product_model->get_dates()
		);
		$this->load->view('welcome_message', $data);
	}

	public function submit_order()
	{
		$this->load->model('product_model');
		$this->product_model->insert_data();
		$this->session->set_flashdata('thank_you_note', 'Thank you for ordering from us!!');
		redirect($this->agent->referrer());
	}
}
