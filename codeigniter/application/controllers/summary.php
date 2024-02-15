<?php
defined('BASEPATH') or exit('No direct script access allowed');

class summary extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->database();
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $this->check_timeout();
    }
    public function summary()
    {
        $data['id'] = $this->uri->segment(3);
        $data['summary_id'] = $this->uri->segment(4);

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

        // Add the po_dates array to the data array
        $data['po_dates'] = $po_dates;

        $this->load->view('templates/header', $data);
        $this->load->view('report/summary', $data);
        $this->load->view('templates/footer');
    }
}
