<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Holiday extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('holiday_model');
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $this->check_timeout();
    }

    public function check_timeout()
    {
        $login_time = $this->session->userdata('login_time');

        if (isset($login_time) && time() - $login_time > 3600) {
            $this->session->set_flashdata('timeout', 'Your session has expired due to inactivity.');
            $this->session->sess_destroy();
            redirect('login');
        } else {
            $this->session->set_userdata('login_time', time());
        }
    }

    public function index()
    {
        // config
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        // $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        // $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link" href="#"><strong>';
        $config['cur_tag_close'] = '</li></a></strong>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $config['base_url'] = base_url('Holiday/index');
		$config['total_rows'] = $this->db->count_all('holiday');
		$config['per_page'] = 10;
        
		$this->pagination->initialize($config);
        
        $data['judul'] = 'Holiday';
        $data['page'] = $this->uri->segment(3);
        $data['holiday'] = $this->holiday_model->paginate($config['per_page'], $this->uri->segment(3));
        
        $this->load->view('templates/header', $data);
        $this->load->view('holiday/index', $data);
        $this->load->view('templates/footer');

        header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    public function add_holiday()
    {
        $data['judul'] = 'Create New Holiday';
        $date = $this->input->post('date');
        $this->db->where('date', $date);
        $query = $this->db->get('holiday');
        
        $this->form_validation->set_rules('date', 'date', 'required|date');
        $this->form_validation->set_rules('description', 'description', 'required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('holiday/add_holiday');
            $this->load->view('templates/footer');

            $this->session->set_flashdata('flash', 'Create New Category Fail!');
        } else {
            if ($query->num_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data already exist');
            redirect('holiday');
            } else {
                $session_name = $this->session->userdata('fullname');
                $admin_id = $this->holiday_model->get_admin_id($session_name);
                $this->holiday_model->add_holiday_data($admin_id);
                $this->session->set_flashdata('flash', 'Create New Holiday Succeed!');
                redirect('holiday');
            }
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

    public function update_holiday($id)
    {
        $data = array(
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description')
        );
        $session_name = $this->session->userdata('fullname');
        $admin_id = $this->holiday_model->get_admin_id($session_name);

        $this->holiday_model->edit_holiday_data($id, $data, $admin_id);
        $this->session->set_flashdata('flash', 'Holiday Successfully Edited!');
        redirect('holiday');
    }

    public function delete_holiday()
    {
        $id = $this->input->post('id_number');
        $result = $this->holiday_model->delete_holiday_data($id);

        if ($result === true) {
            $this->session->set_flashdata('flash', 'Holiday Successfully Deleted!');
            redirect('holiday');
        } else {
            // Store the error message in flashdata
            $this->session->set_flashdata('flash', $result);
            redirect('holiday');
        }
    }

}