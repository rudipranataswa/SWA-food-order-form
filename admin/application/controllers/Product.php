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
        $data['judul'] = 'Menu';
        $data['product'] = $this->product_model->get_menu();
        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_product()
    {
        $data['judul'] = 'Create New Menu';
        // $data['product'] = $this->product_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('product/add_product', $data);
        $this->load->view('templates/footer');
    }

    public function edit_product()
    {
        $data['judul'] = 'Edit Menu#1';
        // $data['product'] = $this->product_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('product/edit_product', $data);
        $this->load->view('templates/footer');
    }
}