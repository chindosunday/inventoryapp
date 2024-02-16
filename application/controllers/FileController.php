<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FileController extends CI_Controller
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
        $user = $this->User_model->get_user_details_with_role($user_id);


        if (!$user) {

            show_error('User not found');
            return;
        }

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

            $this->load->view('upload');
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }


    // public function do_upload()
    // {
    //     $config['upload_path']  = './uploads/'; // Make sure this directory is writable
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['max_size']  = 2048; // 2MB limit
    //     $config['max_width'] = 1024;
    //     $config['max_height'] = 768;

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('profileimage')) {
    //         $error = array('error' => $this->upload->display_errors());
    //         $this->load->view('upload_form', $error);
    //     } else {
    //         $data = array('upload_data' => $this->upload->data());
    //         $this->load->view('upload_success', $data);
    //     }
    // }
}
