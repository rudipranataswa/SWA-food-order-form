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
        $this->load->view('report', $data);    
        $this->load->view('templates/footer');
    }

    public function viewReport() 
    {
        $data['judul'] = 'View Report#1';
        $data['view_report'] = $this->report_model->get__report();

        // Add the following lines to separate the date and time components
        foreach ($data['view_report'] as &$vrpt) {
            $datetime = $vrpt['submitted_date'];
            $date = new DateTime($datetime);
            $vrpt['date_only'] = $date->format('Y-m-d');
            $vrpt['time_only'] = $date->format('H:i:s');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('report/view_report');    
        $this->load->view('templates/footer');
    }

    public function detailReport() 
    {
        $data['judul'] = 'Detail Report';
        $this->load->view('templates/header', $data);
        $this->load->view('report/view_detail');    
        $this->load->view('templates/footer');
    }
}