<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
    }

    public function index() 
    {
        $config['base_url'] = base_url('Po_meal/index');
		$config['total_rows'] = $this->db->count_all('po_purchase_meal_hdr');
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

        $data['judul'] = 'Report';
        $data['report'] = $this->report_model->get_report();
        $this->load->view('templates/header', $data);
        $this->load->view('report/index', $data);    
        $this->load->view('templates/footer');
    }

    public function view_report() 
    {
        $data['judul'] = 'View Report#1';
        $data['view_report'] = $this->report_model->get_view_report();

        // Add the following lines to separate the date and time components
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

    public function detail_report() 
    {
        $data = array(
            'product_item' => $this->report_model->get_product(),
			'dates' => $this->report_model->get_dates(),
			'menu_daily_set' => $this->report_model->get_menu_daily_set(),
			'menu_soup' => $this->report_model->get_menu_soup(),
			'menu_protein' => $this->report_model->get_menu_protein(),
			'menu_rice' => $this->report_model->get_menu_rice(),
			'menu_fruit' => $this->report_model->get_menu_fruit(),
			'menu_pasta' => $this->report_model->get_menu_pasta(),
			'menu_breakfast' => $this->report_model->get_menu_breakfast(),
            'detail_report' => $this->report_model->get_detail_report()
		);

        $data['judul'] = 'Detail Report#1';
        // Add the following lines to separate the date and time components
        foreach ($data['detail_report'] as &$drpt) {
            $datetime = $drpt['date'];
            $date = new DateTime($datetime);
            $drpt['date_only'] = $date->format('Y-m-d');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('report/detail_report', $data);    
        $this->load->view('templates/footer');
    }
}