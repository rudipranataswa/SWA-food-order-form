<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Holiday extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('holiday_model');
        $this->load->library('form_validation');
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

        $this->form_validation->set_rules('date', 'date', 'required|date');
        $this->form_validation->set_rules('description', 'description', 'required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('holiday/add_holiday');
            $this->load->view('templates/footer');
        } else {
            
            $this->holiday_model->add_holdiay_data();
            redirect('holiday');
        }
    }

    public function edit_holiday($id)
    {
        $data['judul'] = 'Edit Holiday#1';
        // $data['holiday'] = $this->holiday_model->get_by_id();
        
        $this->db->where('id', $id);
        $this->db->update('holiday/food_order', $data);
        redirect('holiday/index');
        $this->load->view('templates/header', $data);
        $this->load->view('holiday/edit_holiday', $data);
        $this->load->view('templates/footer');
    }

}