<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper
        $this->load->model('Products_model');
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

            $categories = $this->Category_model->fetchCategories();

            // Prepare the data to be passed to the view
            $data = array(
                'categories' => $categories
            );

            // print_r($data);
            // exit();


            $this->load->view('header');
            $this->load->view('topmenu');

            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('createstock', $data);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }


    public function create_product()
    {
        $id = $this->input->post('code');
        $prod_name = $this->input->post('name');
        $amount = $this->input->post('amount');
        $qty = $this->input->post('qty');

        // Prepare data for insertion
        $data = array(
            'cat_id ' => $id,
            'prod_name' => $prod_name,
            'amount' => $amount,
            'quantity' => $qty,
        );

        // Insert data using User_model
        if ($this->Products_model->addproduct($data)) {
            $this->session->set_flashdata('success_msg', 'Product created successfully!');
            redirect('dashboard');
        } else {
            echo "Failed to create category.";
        }
    }

    public function fetch_product_amount()
    {
        $productId = $this->input->post('product_id');

        $amountPerUnit = $this->Products_model->fetchProductAmount($productId);

        echo json_encode($amountPerUnit);
    }
}
