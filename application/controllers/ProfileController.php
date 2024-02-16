<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
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




        // Check if user data was found
        if (!$user) {
            // Handle the case where user details cannot be found
            // This could involve setting an error message and redirecting
            show_error('User not found');
            return;
        }
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

            $this->load->view('profile',  ['user' => $user]);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }


    public function update_profile()
    {
        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('company', 'Company', '');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', '');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            // $this->load->view('profile'); // Reload the form view if validation fails
            echo "Invalid Validation";
            exit();
        } else {
            // Validation passed, update user info
            $user_id = $this->session->userdata('user_id'); // Assuming user_id is stored in session upon login
            $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),

                // Add other fields here
            );



            if ($this->User_model->update_user($user_id, $data)) {
                // Update successful
                $this->session->set_flashdata('success_msg', 'Profile updated successfully.');
                redirect('profile'); // Redirect to a profile page or wherever you like
            } else {
                // Update failed
                $this->session->set_flashdata('error_msg', 'Failed to update profile.');
                redirect('profile'); // Redirect back to the edit form
            }
        }
    }


    public function change_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        $this->form_validation->set_rules('renewpassword', 'Confirm Password', 'required|matches[newpassword]');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            // $this->load->view('profile'); // Reload the form view if validation fails
            echo "Invalid Validation";
            exit();
        }
        $user_id = $this->session->userdata('user_id');
        $old_password = $this->input->post('password');
        $new_password = $this->input->post('newpassword');
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $update_status = $this->User_model->confirm_password($user_id, $old_password, $hashed_new_password);

        if ($update_status) {
            $this->session->set_flashdata('update_msg', 'Password updated successfully.');
            redirect('profile'); // 
        } else {
            $this->session->set_flashdata('upd_error_msg', 'Old password is  incorrect .');
            redirect('profile'); // 
        }
    }
}
