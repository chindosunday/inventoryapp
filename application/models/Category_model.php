<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_category($data)
    {
        return $this->db->insert('category', $data);
    }


    public function fetchCategories()
    {

        $this->db->select('cat_ID, name, description');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result_array();
    }





    public function update_category($cat_id, $new_password)
    {

        $this->db->where('userID', $user_id);
        return $this->db->update('users', ['password' => $new_password]);
    }










    // Add other user related methods here
}
