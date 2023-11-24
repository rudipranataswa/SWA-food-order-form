<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() 
    {
        $data['judul'] = 'Login';
        // $data['login_item'] = $this->login_model->get_login();
        $this->load->view('templates/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer_login');
    }

    public function login() 
    {
        // Handle user login
    }

    public function forget_password() 
    {
        $data['judul'] = 'Forget Password';
        // $data['login_item'] = $this->login_model->get_login();
        $this->load->view('templates/header_login', $data);
        $this->load->view('login/forget_password');
        $this->load->view('templates/footer_login');
    }
}
