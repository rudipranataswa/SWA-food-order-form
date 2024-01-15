<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
		$this->load->database();
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

    public function view_report($id) 
    {
        $data['judul'] = 'View Report';
        $data['view_report'] = $this->report_model->get_view_report($id);

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

    public function summary($id) {
        $data = array(
            'holidays' => $this->report_model->get_holidays(),
            'detail_report' => $this->report_model->get_detail_report($id)
        );
        
        $data['judul'] = 'Summary';
        
        // Add the condition to the detail_report
        $po_dates = array();
        foreach ($data['detail_report'] as &$drpt) {
            $datetime = $drpt['date'];
            $date = new DateTime($datetime);
            $drpt['date_only'] = $date->format('Y-m-d');
            
            // Add the po_date to the po_dates array
            $po_dates[] = $drpt['po_date'];
        }
        
        // Remove duplicates from the po_dates array
        $po_dates = array_unique($po_dates);
        
        // Add the po_dates array to the data array
        $data['po_dates'] = $po_dates;

        $this->load->view('templates/header', $data);
        $this->load->view('report/summary', $data);    
        $this->load->view('templates/footer');
    }

}

// $drpt['id_order'] == $drpt['id_ord'] && 