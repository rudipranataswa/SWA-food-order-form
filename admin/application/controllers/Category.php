<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model'); 
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
        $config['base_url'] = base_url('category/index');
        $config['total_rows'] = $this->db->count_all('category');
        $config['per_page'] = 10;

        $data['judul'] = 'Category';
        $data['page'] = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['category_item'] = $this->category_model->paginate($config['per_page'], $this->uri->segment(3));

        $this->load->view('templates/header', $data);
        $this->load->view('category/index', $data);
        $this->load->view('templates/footer');

        header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    public function add_category()
    {
        $data['judul'] = 'Create New Category';
        $category = $this->input->post('Category');
        $this->db->where('category', $category);
        $query = $this->db->get('category');
        $this->form_validation->set_rules('Category', 'Category', 'required', array('required' => 'Category field must not be empty'));

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('category/add_category', $data);
            $this->load->view('templates/footer');

            $this->session->set_flashdata('flash ', 'Create New Category Fail!');
            // redirect('category');
        } else {
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('flash', 'Data Already Exist');
                redirect('category');
            } else {
                $category = $this->input->post('Category');
                $session_name = $this->session->userdata('fullname');
                $admin_id = $this->category_model->get_admin_id($session_name);
                
                $this->category_model->create_category($category, $admin_id);
                $this->session->set_flashdata('flash', 'Create New Category Succeed!');
                redirect('category');
            }
        }
    }

    public function edit_category()
    {
        $data['id'] = $this->uri->segment(3);
        $data['judul'] = 'Edit New Category ' . $data['id'];
        $data['category_name'] = $this->category_model->get_category_name($data['id']); // Fetch the category name
        $this->load->view('templates/header', $data);
        $this->load->view('category/edit_category', $data);
        $this->load->view('templates/footer');
    }

    // public function create_new()
    // {
    //     $data['judul'] = 'Create New Category';
    //     $category = $this->input->post('Category');
    //     $this->db->where('category', $category);
    //     $query = $this->db->get('category');
    //     $this->form_validation->set_rules('Category', 'Category', 'required', array('required' => 'Category field must not be empty'));

    //     if ($this->form_validation->run() === FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('category/add_category', $data);
    //         $this->load->view('templates/footer');

    //         $this->session->set_flashdata('flash ', 'Create New Category Fail!');
    //         // redirect('category');
    //     } else {
    //         if ($query->num_rows() > 0) {
    //             $this->session->set_flashdata('flash', 'Data Already Exist');
    //             redirect('category');
    //         } else {
    //             $category = $this->input->post('Category');
    //             $session_name = $this->session->userdata('fullname');
    //             $admin_id = $this->category_model->get_admin_id($session_name);
                
    //             $this->category_model->create_category($category, $admin_id);
    //             $this->session->set_flashdata('flash', 'Create New Category Succeed!');
    //             redirect('category');
    //         }
    //     }
    // }
        
    public function update_category()
    {
        $id = $this->input->post('id_number');
        $category = $this->input->post('Category1');
        $this->db->where('category', $category);
        $query = $this->db->get('category');
        $query1 = $this->db->get('po_purchase_meal_dtl');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Already Exist');
            redirect('category');
        } else if ($query1->num_rows() > 0) {
            $this->session->set_flashdata('flash', 'Fail: Cannot edit category because it exists in PO Purchase');
            redirect('category');
        } else {
            $session_name = $this->session->userdata('fullname');
            $admin_id = $this->category_model->get_admin_id($session_name);
            
            $this->category_model->update_category($id, $category, $admin_id);
            $this->session->set_flashdata('flash', 'Edit Category Succeed!');
            redirect('category');
        }  
    }

    public function delete_category()
    {
        $id = $this->input->post('id_number');
        $result = $this->category_model->delete_category($id);
        $query = $this->db->get('po_purchase_meal_dtl');

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('flash', 'Fail: Cannot delete category because it exists in PO Purchase');
            redirect('category');
        } else {
            $this->category_model->delete_category($id);
            $this->session->set_flashdata('flash', 'Success: Menu deleted');
            redirect('category');
        }
    }
}
