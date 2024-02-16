<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper
        $this->load->model('Category_model');
        $this->load->library('session');
    }

    public function index()
    {


        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');

        // Check if user is logged in
        if (!$user_id) {
            // User not logged in, redirect to login page
            redirect('login');
        } else {



            $this->load->view('header');
            $this->load->view('topmenu');

            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('addcategory');
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }

    public function create_category()
    {
        $cat_name = $this->input->post('name');
        $desc = $this->input->post('description');

        // Prepare data for insertion
        $data = array(
            'name' => $cat_name,
            'description' => $desc,
        );

        // Insert data using User_model
        if ($this->Category_model->create_category($data)) {
            $this->session->set_flashdata('success_msg', 'Catgory created successfully!');
            redirect('dashboard');
        } else {
            echo "Failed to create category.";
        }
    }



    public function get_all_categories()
    {
    }
}
