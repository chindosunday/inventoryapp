<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewStaffController extends CI_Controller
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
            $data['staff'] = $this->User_model->getAllStaff();



            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('viewallstaff',  $data);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }

    public function update_status()
    {
        $this->load->model('User_model'); // Assuming you have a User_model

        $userID = $this->input->post('userID');
        $status = $this->input->post('status');

        if ($this->User_model->update_user_status($userID, $status)) {
            $response = array('status' => 'success', 'message' => 'User status updated successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update user status.');
        }

        echo json_encode($response);
    }
}
