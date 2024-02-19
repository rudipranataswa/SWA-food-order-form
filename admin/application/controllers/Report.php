<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('report_model');
		$this->load->database();
        // Login Validator
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $this->check_timeout();
    }

    // Timeout Website
    public function check_timeout()
    {
        $login_time = $this->session->userdata('login_time');

        // Timeout after 1 hour
        if (isset($login_time) && time() - $login_time > 3600) {
            $this->session->set_flashdata('timeout', 'Your session has expired due to inactivity.');
            $this->session->sess_destroy();
            redirect('login');
        } else {
            $this->session->set_userdata('login_time', time());
        }
    }

    // Load Report View Index from PO Purchase Header
    public function index() 
    {
        // Pagination Config
        $config['base_url'] = base_url('po_meal/index');
		$config['total_rows'] = $this->db->count_all('po_purchase_meal_hdr');
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

        $data['judul'] = 'Report';
        $data['page'] = $this->uri->segment(3);
        $data['report'] = $this->report_model->get_report($config['per_page'], $data['page']);

        $this->load->view('templates/header', $data);
        $this->load->view('report/index', $data);    
        $this->load->view('templates/footer');
    }

    // Load Customer from PO Purchase Header
    public function view_report($id) 
    {
        // Get all IDs
        $this->db->select('id');
        $this->db->where('po_purchase_meal_hdr_id', $id);
        // $this->db->order_by('id', 'ASC');
        $all_ids = $this->db->get('order_hdr')->result_array();

        // Convert the result to a simple array of IDs
        $ids = array_column($all_ids, 'id');

        // print_r($ids); exit;

        // Pagination Config
        $config['base_url'] = base_url('po_meal/view_report');
        $config['total_rows'] = count($ids);
        $config['per_page'] = 10;

        // Get the page number from the URL
        $page = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        // Calculate the start index for the array slice
        $start_index = $page * $config['per_page'];

        // Get the IDs for the current page
        $page_ids = array_slice($ids, $start_index, $config['per_page']);

        // // Pagination Config
        // $config['base_url'] = base_url('po_meal/view_report');
		// $config['total_rows'] = $this->db->count_all('order_hdr', $id);
		// $config['per_page'] = 10;

        // // Get the page number from the URL
        // $page = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        // // Calculate the start ID for the query
        // $start_id = $page * $config['per_page'];

        $this->pagination->initialize($config);

        $data['judul'] = 'View Report';
        $data['page'] = $page;
        $data['view_report'] = $this->report_model->get_view_report($page_ids); // $id, $config['per_page'], $start_id
        $data['report'] = $this->report_model->get_dates($id);

		// $this->pagination->initialize($config);
        // $data['judul'] = 'View Report';
        // $data['page'] = $this->uri->segment(4);
        // $data['view_report'] = $this->report_model->get_view_report($id, $config['per_page'], $data['page']);
        // $data['report'] = $this->report_model->get_dates($id);

        foreach ($data['view_report'] as &$vrpt) {
            $datetime = $vrpt['submitted_date'];
            $date = new DateTime($datetime);
            $vrpt['date_only'] = $date->format('Y-m-d');
            $vrpt['time_only'] = $date->format('H:i:s');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('report/view_report', $data);    
        $this->load->view('templates/footer');
    }

    public function detail_report($id) 
    {
        $data = array(
            'product_item' => $this->report_model->get_product(),
            'dates' => $this->report_model->get_dates($id),
            'holidays' => $this->report_model->get_holidays(),
            'menu_daily_set' => $this->report_model->get_menu_daily_set($id),
            'menu_pasta' => $this->report_model->get_menu_pasta($id),
            'menu_breakfast' => $this->report_model->get_menu_breakfast($id),
            'child_menus' => $this->report_model->get_child_menus($id),
            'detail_report' => $this->report_model->get_detail_report($id)
        );

        $data['judul'] = 'Detail Report';
        // Add the condition to the detail_report
        foreach ($data['detail_report'] as &$drpt) {
            $datetime = $drpt['date'];
            $date = new DateTime($datetime);
            $drpt['date_only'] = $date->format('Y-m-d'); 
        }

        $this->load->view('templates/header', $data);
        $this->load->view('report/detail_report', $data);    
        $this->load->view('templates/footer');
    }

    // Load summary from per customer order
    public function summary() 
    {
        // Take id from link url
        $data['id'] = $this->uri->segment(3);
        $data['summary_id'] = $this->uri->segment(4);

        // Load data like holiday, po dates and data for summary
        $data = array(
            'holidays' => $this->report_model->get_holidays(),
            'dates' => $this->report_model->get_dates($data['id']),
            'summary' => $this->report_model->summary($data['summary_id'])
        );
        
        $data['judul'] = 'Summary';
        
        // Add the condition to the detail_report
        $po_dates = array();
        foreach ($data['summary'] as &$drpt) {
            $datetime = $drpt['date'];
            $date = new DateTime($datetime);
            $drpt['date_only'] = $date->format('Y-m-d');
            
            // Add the po_date to the po_dates array
            $po_dates[] = $drpt['po_date'];
        }
        
        // Remove duplicates from the po_dates array
        $po_dates = array_unique($po_dates);
        sort($po_dates);
        // print_r($po_dates); exit;
        
        // Add the po_dates array to the data array
        $data['po_dates'] = $po_dates;

        $this->load->view('templates/header', $data);
        $this->load->view('report/summary', $data);    
        $this->load->view('templates/footer');
    }

}

// $drpt['id_order'] == $drpt['id_ord'] && 