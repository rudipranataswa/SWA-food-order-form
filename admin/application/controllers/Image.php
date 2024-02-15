<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul'] = 'Image Upload';
		$this->load->view('templates/header', $data);
		$this->load->view('image/index', $data);
		$this->load->view('templates/footer');
	}
}
