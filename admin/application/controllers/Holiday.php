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
        $data['holiday'] = $this->holiday_model->paginate($config['per_page'], $this->uri->segment(3));
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
            $this->holiday_model->add_holiday_data();
            $this->session->set_flashdata('message', "Success: Holiday has been added!");
            redirect('holiday');
        }
    }

    public function edit_holiday($id)
    {
        $data['judul'] = 'Edit Holiday';
        $data['holiday'] = $this->holiday_model->get_by_id($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('holiday/edit_holiday', $data);
        $this->load->view('templates/footer');
    }

    public function update_data($id)
    {
        $date = $this->input->post('date');
		$description = $this->input->post('description');
        
        $this->holiday_model->edit_holiday_data($id, $date, $description);
        $this->session->set_tempdata('message', "Success: {$description} edited!", 1);
        redirect('holiday');
    }

    public function delete_holiday()
    {
        $id = $this->input->post('id_number');
        $result = $this->holiday_model->delete_holiday_data($id);

        if ($result === true) {
            $this->session->set_flashdata('message', "Success: Holiday is deleted!");
            redirect('holiday');
        } else {
            // Store the error message in flashdata
            $this->session->set_flashdata('message', "Failed: Holiday is not deleted!");
            redirect('holiday');
        }
    }
}