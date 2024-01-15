<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('session');
        // if (!$this->session->userdata('logged_in')) {
        //     // Redirect to login page
        //     redirect('login');
        // }
    }

    public function index()
    {
        $this->check_timeout();
        $this->load->library('pagination');
        $config['num_tag_open'] = '&nbsp;<span class="pagination-link">';
        $config['num_tag_close'] = '</span>&nbsp;';
        $config['base_url'] = base_url('Product/index');
        $config['total_rows'] = $this->db->count_all('menu');
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['judul'] = 'Product';
        $data['product'] = $this->product_model->get_by_id($config['per_page'], $this->uri->segment(3));
        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');

        header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
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

    public function add_product()
    {
        $data['judul'] = 'Create New Product';
        $data['categories'] = $this->product_model->get_category();
        // $data['product'] = $this->product_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('product/add_product', $data);
        $this->load->view('templates/footer');
    }

    public function edit_product()
    {
        $data['judul'] = 'Edit Product #1';
        $data['categories'] = $this->product_model->get_category();
        $data['products'] = $this->product_model->get_product();
        // $data['product'] = $this->product_model->get_by_id();
        $this->load->view('templates/header', $data);
        $this->load->view('product/edit_product', $data);
        $this->load->view('templates/footer');
    }

    public function create_new()
    {
        $category = $this->input->post('Category');
        $name = $this->input->post('Name');
        $result = $this->product_model->create_menu($category, $name);

        if ($result) {
            $this->session->set_flashdata('message', 'Create New Menu Succeed!');
            redirect('product/add_product');
        } else {
            $this->session->set_flashdata('message', 'Create New Menu Fail!');
            redirect('product/add_product');
        }
    }

    public function update_menu()
    {
        $id = $this->input->post('hf-id');
        $this->db->where('id_menu', $id);
        $query = $this->db->get('po_purchase_meal_dtl');
        $category_id = $this->input->post('Category');
        $name = $this->input->post('Name');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('message', 'Fail: Cannot edit product because it exists in po_purchase_meal_dtl');
            redirect('product');
        } else {
            $this->product_model->update_product($id, $category_id, $name);
            $this->session->set_flashdata('message', 'Success: Product edited!');
            redirect('product');
        }
    }

    public function delete_product()
    {
        $id = $this->input->post('id');
        $this->db->where('id_menu', $id);
        $query = $this->db->get('po_purchase_meal_dtl');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('message', 'Fail: Cannot delete product because it exists in po_purchase_meal_dtl');
            redirect('product');
        } else {
            $this->product_model->delete_product($id);
            $this->session->set_flashdata('message', 'Success: Product deleted');
            redirect('product');
        }
    }
}
