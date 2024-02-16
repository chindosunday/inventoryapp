<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addTransaction($data)
    {
        return $this->db->insert('transactions', $data);
    }


    public function fetchAllTransactionDetails()
    {

        $this->db->select('trans_id, amount,status, reference, email');
        $this->db->from('transactions');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function fetchTransactionDetailsByInvboice($reference)
    {

        $this->db->select('trans_id, cust_id, amount, reference, status');
        $this->db->from('transactions');
        $this->db->where('transactions.reference', $reference);
        $query = $this->db->get();
        return $query->result_array();
    }



    // public function fetchAllTransaction()
    // {

    //     $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
    //     $this->db->from('products');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }


    // public function fetchAllTransactionByDate($date)
    // {

    //     $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
    //     $this->db->from('products');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }


    // public function fetchAllTransactionBetweenDate($start, $end)
    // {

    //     $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
    //     $this->db->from('products');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function fetchTransactionById($invoice_id)
    // {

    //     $this->db->select('amount');
    //     $this->db->from('products');
    //     $this->db->where('pro_ID', $invoice_id);
    //     $query = $this->db->get();
    //     return $query->row();  // Returns a single result row.
    // }




    // Add other user related methods here
}
