<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        } else {
            $this->load->view('header');
            $this->load->view('loginpage');
            $this->load->view('footer');
        }
    }

    public function authenticate()
    {
        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load login view again
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        } else {
            // Validation passed, proceed with authentication
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Authenticate user
            $user = $this->User_model->authenticate_user($email, $password);
            print_r($user);


            if ($user) {
                // Set session data
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('user_id', $user['userID']);
                $this->session->set_userdata('user_role', $user['userRole']);

                // Redirect to dashboard or another protected area
                redirect('dashboard');
            } else {
                // Authentication failed, set error message
                $this->session->set_flashdata('error_msg', 'Invalid username or password');
                redirect('login'); // Redirect back to the login page
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();


        redirect('login');
    }
}
