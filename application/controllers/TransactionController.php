<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper

        $this->load->model('Products_model');
        $this->load->model('Invoice_model');
        $this->load->model('User_model');
        $this->load->model('Transaction_model');
        $this->load->library('session');
        $this->load->config('paystack');
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

    public function verifyTransaction($reference)
    {

        // Get secret key from config
        $secretKey = $this->config->item('paystack_secret_key');


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secretKey",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);


        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // Handle cURL error
            log_message('error', 'cURL Error in Paystack Verification: ' . $err);
            redirect('error_page'); // Adjust to your error handling route
        } else {
            $result = json_decode($response);
            if ($result && $result->data && $result->data->status == 'success') {
                // Handle successful verification
                $data = [
                    'amount' => $result->data->amount,
                    'status' => $result->data->status,
                    'reference' => $result->data->reference,
                    'email' => $result->data->customer->email,
                ];
                // Insert transaction data into database
                $inserted = $this->record_transaction($data);
                if ($inserted) {
                    $invoice_result = $this->Invoice_model->fetchinvoiceRowById($result->data->reference);


                    $product_result  =    $this->Products_model->fetchProductQuantity($invoice_result->pro_id);
                    $product_update   =   $product_result->quantity - $invoice_result->qty;

                    $this->Products_model->update_product_quantity($invoice_result->pro_id,  $product_update);




                    redirect('dashboard'); // Adjust to your success handling route
                } else {
                    log_message('error', 'Database insert failed in Paystack Verification');
                    redirect('error_page'); // Adjust to your error handling route
                }
            } else {
                redirect('error_page'); // Adjust to your error handling route
            }
        }
    }


    private function record_transaction($data)
    {
        // Assuming you have a model to handle database operations
        // $this->load->model('transaction_model');
        // return $this->transaction_model->insert_transaction($data);
        // For simplicity, using CI's DB query builder directly here:


        return $this->Transaction_model->addTransaction($data);
    }
}
