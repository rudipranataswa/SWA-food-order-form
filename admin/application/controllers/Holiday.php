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
        $config['base_url'] = base_url('Holiday/index');
		$config['total_rows'] = $this->db->count_all('holiday');
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

        $data['judul'] = 'Holiday';
        $data['holiday'] = $this->holiday_model->get_by_id($config['per_page'], $this->uri->segment(3));
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
            // $holiday = $this->input->post('holiday');
            $this->holiday_model->add_holiday_data();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('holiday');
        }
    }

    public function edit_holiday($id)
    {
        $data['judul'] = 'Edit Holiday#1';
        $data['holiday'] = $this->holiday_model->get_by_id($id);
        
        $this->form_validation->set_rules('date', 'date', 'required|date');
        $this->form_validation->set_rules('description', 'description', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('holiday/edit_holiday', $data);
            $this->load->view('templates/footer');
        } else {
            // $holiday = $this->input->post('holiday');
            $this->holiday_model->edit_holiday_data();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('holiday');
        }
        
    }

    public function delete_holiday()
    {
        // $this->holiday_model->delete_holiday_data($id);
        // $this->session->set_flashdata('flash', 'Dihapus');
        // redirect('holiday');
        $id = $this->input->post('id_number');
        $result = $this->holiday_model->delete_holiday_data($id);

        if ($result === true) {
            redirect('holiday');
        } else {
            // Store the error message in flashdata
            $this->session->set_flashdata('error_message', $result);
            redirect('holiday');
        }
    }

}