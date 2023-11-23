<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index()
    {
        $data['judul'] = 'Category';
        $data['category_item'] = $this->category_model->get_category();
        $this->load->view('templates/header', $data);
        $this->load->view('category/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_category()
    {
        $data['judul'] = 'Create New Category';
        $data['category_item'] = $this->category_model->get_category();
        $this->load->view('templates/header', $data);
        $this->load->view('category/add_category', $data);
        $this->load->view('templates/footer');
    }

    public function edit_category()
    {
        $data['judul'] = 'Edit New Category#1';
        // $data['category_item'] = $this->category_model->get_category();
        $this->load->view('templates/header', $data);
        $this->load->view('category/edit_category', $data);
        $this->load->view('templates/footer');
    }
}
