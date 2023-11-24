<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Holiday extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('holiday_model');
    }

    public function index()
    {
        $data['judul'] = 'Holiday';
        $data['holiday'] = $this->holiday_model->get_holiday();
        $this->load->view('templates/header', $data);
        $this->load->view('holiday/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_holiday()
    {
        $data['judul'] = 'Create New Holiday';
        // $data['holiday'] = $this->holiday_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('holiday/add_holiday', $data);
        $this->load->view('templates/footer');
    }

    public function edit_holiday()
    {
        $data['judul'] = 'Edit Holiday #1';
        // $data['holiday'] = $this->holiday_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('holiday/edit_holiday', $data);
        $this->load->view('templates/footer');
    }

}