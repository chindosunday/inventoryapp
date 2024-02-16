<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignupController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function index()
    {

        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');

        if ($this->session->userdata('logged_in')) {


            if ($user_role == 1) {
                // User is an admin
                $this->load->view('header');
                $this->load->view('Signuppage');
                $this->load->view('footer');
            } else if ($user_role == 2) {
                // User is not an admin, redirect or show error

                $this->load->view('header');
                $this->load->view('topmenu');
                $this->load->view('staffmenu');
                $this->load->view('viewstock');
                $this->load->view('footerdashboard');
                $this->load->view('footer');  // Redirect to another page
            } else if ($user_role == 3) {
                // User is not an admin, redirect or show error

                $this->load->view('header');
                $this->load->view('topmenu');
                $this->load->view('distributormenu');
                $this->load->view('viewstock');
                $this->load->view('footerdashboard');
                $this->load->view('footer');  // Redirect to another page
            }
        } else {
            // Not logged in, redirect to login page
            redirect('login');
        }
    }

    public function create_user()
    {
        $username = $this->input->post('name');
        $email = $this->input->post('email');
        $userrole =  $this->input->post('user_role');
        $password = $this->input->post('password');



        // Prepare data for insertion
        $data = array(
            'name' => $username,
            'email' => $email,
            'userRole' => $userrole,
            'password' => password_hash($password, PASSWORD_DEFAULT)

        );



        // Insert data using User_model
        if ($this->User_model->create_user($data)) {
            $this->session->set_flashdata('success_msg', 'User created successfully!');
            redirect('dashboard');
        } else {
            echo "Failed to create user.";
        }
    }

    public function guardsRegisteration()
    {
    }
}
