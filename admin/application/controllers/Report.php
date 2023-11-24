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
        $data['judul'] = 'Detail Report';
        $data['detail_report'] = $this->report_model->get_detail_report();
        $this->load->view('templates/header', $data);
        $this->load->view('report/detail_report');    
        $this->load->view('templates/footer');
    }
}