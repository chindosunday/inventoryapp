<?php
defined('BASEPATH') or exit('No direct script access allowed');

class invoice_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addinvoice($data)
    {
        return $this->db->insert('invoice', $data);
    }



    public function fetchAllInvoice()
    {

        $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function fetchAllInvoiceByDate($date)
    {

        $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function fetchAllInvoiceBetweenDate($start, $end)
    {

        $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchinvoiceById($invoice_id)
    {

        $this->db->select('amount');
        $this->db->from('products');
        $this->db->where('pro_ID', $invoice_id);
        $query = $this->db->get();
        return $query->row();  // Returns a single result row.
    }

    public function fetchinvoiceRowById($invoice_id)
    {

        $this->db->select('qty, pro_id');
        $this->db->from('invoice');
        $this->db->where('invoice_number', $invoice_id);
        $query = $this->db->get();
        return $query->row();  // Returns a single result row.
    }

    public function fetchinvoiceByRequestId($request_id)
    {

        $this->db->select('invoice.invoice_number, invoice.amount, invoice.qty, products.prod_name');
        $this->db->from('invoice');
        $this->db->join('products', 'invoice.pro_id = products.pro_ID');
        $this->db->where('invoice.request_id', $request_id);
        $query = $this->db->get();

        // To get the result as an array of objects
        $result = $query->result(); // Returns a single result row.

        return $result;
    }


    // Add other user related methods here
}
