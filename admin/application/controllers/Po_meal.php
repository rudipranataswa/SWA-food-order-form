<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->view('templates/header', $data);
        $this->load->view('po_meal/add_po_meal');        
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
}
