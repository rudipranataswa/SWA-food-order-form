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
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('product_model');
		$this->load->helper('url_helper');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('user_agent');
		$this->load->library('session');
		// $this->load->library('security');
	}

	public function index()
	{
		$data = array(
			'product_item' => $this->product_model->get_product(),
			'dates' => $this->product_model->get_dates(),
			'menu_daily_set' => $this->product_model->get_menu_daily_set(),
			'menu_soup' => $this->product_model->get_menu_soup(),
			'menu_protein' => $this->product_model->get_menu_protein(),
			'menu_rice' => $this->product_model->get_menu_rice(),
			'menu_fruit' => $this->product_model->get_menu_fruit(),
			'menu_pasta' => $this->product_model->get_menu_pasta(),
			'menu_breakfast' => $this->product_model->get_menu_breakfast(),
			'csrf' => array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			)
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
