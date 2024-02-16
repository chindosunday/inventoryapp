<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_user($data)
    {
        return $this->db->insert('users', $data);
    }



    public function authenticate_user($email, $password)
    {
        // Query the database for the user with the given email
        $this->db->where('email', $email);
        $this->db->where('status', 'active');
        $query = $this->db->get('users'); // Assuming 'users' is your table name

        if ($query->num_rows() == 1) {
            $user = $query->row_array();

            // Verify the password (assuming the password is hashed)
            if (password_verify($password, $user['password'])) {
                // Password is correct
                return $user; // Return the user's data
            }
        }

        // User not found or password does not match
        return false;
    }


    public function confirm_password($user_id, $oldpassword, $new_password)
    {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('userID', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $hashedpassword = $result->password;
            // Do something with the password
            // Verify the password (assuming the password is hashed)
            if (password_verify($oldpassword, $hashedpassword)) {
                // Password is correct
                $this->update_password($user_id,  $new_password); // Return the user's data
                return true;
            } else {
                // 
                return false;
            }
        }
    }

    public function update_password($user_id, $new_password)
    {

        $this->db->where('userID', $user_id);
        return $this->db->update('users', ['password' => $new_password]);
    }


    public function get_user_details($user_id)
    {
        $this->db->where('userID', $user_id);
        $query = $this->db->get('users');
        return $query->row();  // Returns a single result row.
    }


    public function update_user($user_id, $data)
    {
        $this->db->where('userID', $user_id);
        return $this->db->update('users', $data);
    }

    public function get_user_details_with_role($user_id)
    {
        $this->db->select('users.*, user_role.role as role_description');
        $this->db->from('users');
        $this->db->join('user_role', 'users.userRole = user_role.role_id', 'inner');
        $this->db->where('users.userID', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function getAllStaff()
    {
        // Assuming '2' is the identifier for staff in the userRole column
        $staffRoleId = 2;

        $this->db->select('users.*, user_role.role as userRoleName');
        $this->db->from('users');
        $this->db->join('user_role', 'users.userRole = user_role.role_id', 'inner');
        $this->db->where('users.userRole', $staffRoleId);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getAllDistributors()
    {
        // Assuming '2' is the identifier for staff in the userRole column
        $staffRoleId = 3;

        $this->db->select('users.*, user_role.role as userRoleName');
        $this->db->from('users');
        $this->db->join('user_role', 'users.userRole = user_role.role_id', 'inner');
        $this->db->where('users.userRole', $staffRoleId);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function update_user_status($userID, $status)
    {
        $data = array('status' => $status);

        $this->db->where('userID', $userID);
        return $this->db->update('users', $data);
    }
    // Add other user related methods here
}
