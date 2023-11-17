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
        $this->load->view('templates/header', $data);
        $this->load->view('report');    
        $this->load->view('templates/footer');
    }

    public function viewReport() 
    {
        $data['judul'] = 'View Report#1';
        $this->load->view('templates/header', $data);
        $this->load->view('report');    
        $this->load->view('templates/footer');
    }

    public function detailReport() 
    {
        $data['judul'] = 'Detail Report';
        $this->load->view('templates/header', $data);
        $this->load->view('report');    
        $this->load->view('templates/footer');
    }
}
