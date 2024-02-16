<?php
defined('BASEPATH') or exit('No direct script access allowed');

class products_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addproduct($data)
    {
        return $this->db->insert('products', $data);
    }



    public function fetchProducts()
    {

        $this->db->select('pro_ID, cat_id, prod_name, quantity, amount, datee');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchProductAmount($prod_id)
    {

        $this->db->select('amount');
        $this->db->from('products');
        $this->db->where('pro_ID', $prod_id);
        $query = $this->db->get();
        return $query->row();  // Returns a single result row.
    }


    public function fetchProductQuantity($prod_id)
    {

        $this->db->select('quantity');
        $this->db->from('products');
        $this->db->where('pro_ID', $prod_id);
        $query = $this->db->get();
        return $query->row();  // Returns a single result row.
    }


    public function update_product_quantity($pro_ID, $new_quantity)
    {
        $data = array(
            'quantity' => $new_quantity
        );

        $this->db->where('pro_ID', $pro_ID);
        return $this->db->update('products', $data);
    }

    // Add other user related methods here
}
