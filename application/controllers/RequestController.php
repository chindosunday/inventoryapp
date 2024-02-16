<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper
        $this->load->model('Request_model');
        $this->load->model('Products_model');
        $this->load->model('Invoice_model');
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
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('requestpage');
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }

    public function make_request()
    {

        $user_id = $this->session->userdata('user_id');
        $user_id = $user_id;
        $title = $this->input->post('title');
        $request_msg = $this->input->post('request_msg');
        //$status = $this->input->post('status');


        // Prepare data for insertion
        $data = array(
            'user_id' => $user_id,
            'title' => $title,
            'request_msg' => $request_msg,
            // 'status' => $status,
        );

        // Insert data using request_model
        if ($this->Request_model->makeRequest($data)) {
            $this->session->set_flashdata('success_msg', 'Request sent successfully successfully!');
            redirect('dashboard');
        } else {
            echo "Unable to send a request";
        }
    }
    public function viewRequests()
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

            $requests = $this->Request_model->get_user_requests();

            $data = array(
                'requests' => $requests
            );


            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('viewrequests', $data);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }
    public function distributorRequest()
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

            $requests = $this->Request_model->get_my_request($user_id);




            $data = array(
                'requests' => $requests
            );

            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('distributorrequest', $data);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }

    public function requestDetails()
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

            $item_id = $this->input->get('id', TRUE);

            $request = $this->Request_model->get_request($item_id);



            // print_r($requests);
            // die();




            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('requestdetails', ['request' => $request]);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }


    public function requestResponse()
    {

        $user_id = $this->session->userdata('user_id');
        $user_role = $this->session->userdata('user_role');

        // Check if user is logged in
        if (!$user_id) {
            // User not logged in, redirect to login page
            redirect('login');
        } else {

            $products = $this->Products_model->fetchProducts();

            // Prepare the data to be passed to the view

            // print_r($data);
            // die();



            $this->load->view('header');
            $this->load->view('topmenu');

            $item_id = $this->input->get('id', TRUE);





            $request = $this->Request_model->get_request($item_id);





            $data = array(
                'request' => $request,
                'products' => $products,
                'item_id' => $item_id
            );

            // print_r($requests);
            // die();




            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('responsepage',  $data);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }


    public function createResponse()
    {


        $item_id = $this->input->post('id');
        $request_msg = $this->input->post('request_msg');
        $qty = $this->input->post('qty');
        $amount = $this->input->post('amount');
        $productId = $this->input->post('productId');
        $invoice_number = bin2hex(random_bytes(10));


        $request_data = array(
            'request_id' => $item_id,
            'message' => $request_msg,
            // 'status' => $status,
        );

        $invoice_data = array(
            'productId' => $productId,
            'request_id' => $item_id,
            'invoice_number' => $invoice_number,
            'amount' => $amount,
            'qty' => $qty,



            // 'status' => $status,
        );

        $request_result = $this->Request_model->createResponse($request_data);


        if ($request_result) {
            $update_result = $this->Request_model->update_request_status($item_id);

            if ($update_result) {
                $invoice_result = $this->Invoice_model->addinvoice($invoice_data);
                if ($invoice_result) {
                    redirect('/dashboard');
                }
            }
        } else {
        }
    }

    public function viewResponse()
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
            $request_id = $this->input->get('id', TRUE);


            $this->load->config('paystack');
            $paystack_public_key = $this->config->item('paystack_public_key');
            $response_result = $this->Request_model->get_response($request_id);
            $invoice_result = $this->Invoice_model->fetchinvoiceByRequestId($request_id);
            $user = $this->User_model->get_user_details_with_role($user_id);




            $data = array(
                'response_result' => $response_result,
                'invoice_result' => $invoice_result,
                'paystack_public_key' => $paystack_public_key,
                'user' => $user,

            );

            if ($user_role == 1) {
                $this->load->view('asidemenu');
            } else if ($user_role  == 2) {
                $this->load->view('staffmenu');
            } else if ($user_role  == 3) {
                $this->load->view('distributormenu');
            }

            $this->load->view('viewresponse', $data);
            $this->load->view('footerdashboard');
            $this->load->view('footer');
        }
    }
}
