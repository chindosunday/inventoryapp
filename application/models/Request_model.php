<?php
defined('BASEPATH') or exit('No direct script access allowed');

class request_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function makeRequest($data)
    {
        return $this->db->insert('request', $data);
    }

    public function createResponse($data)
    {
        return $this->db->insert('response', $data);
    }



    public function get_user_requests()
    {
        $this->db->select('request.id, request.title, request.request_msg, request.status, request.date, users.name');
        $this->db->from('request'); // Specifies the primary table
        $this->db->join('users', 'request.user_id = users.userID'); // Join condition
        $this->db->where('request.status', 'Awaiting');

        $query = $this->db->get(); // Executes the query

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Returns the query result as an array
        } else {
            return false; // Return false if no records found
        }
    }


    public function get_my_request($id)
    {
        $this->db->select('request.id, request.title, request.request_msg, request.status, request.date,');
        $this->db->from('request'); // Specifies the primary table
        $this->db->where('user_id', $id);

        $query = $this->db->get(); // Executes the query

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Returns the query result as an array
        } else {
            return false; // Return false if no records found
        }
    }

    public function get_request($id)
    {
        $this->db->select('request.id, request.title, request.request_msg');
        $this->db->from('request');
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_request_status($request_id)
    {

        $data = array(
            'status' => 'Responded' // Correctly formatted as an associative array
        );
        $this->db->where('id', $request_id);
        return $this->db->update('request', $data);
    }


    public function get_response($id)
    {
        $this->db->select('response.request_id,  response.message');
        $this->db->from('response');
        $this->db->where('request_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }





    // Add other user related methods here
}
