<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateStockController extends CI_Controller
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
            } else if ($user_role == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('createstock');
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }
}
