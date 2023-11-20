<?php

class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function register_user($user) {
        // Insert user data into the 'users' table
    }

    public function login_user($username, $password) {
        // Validate user credentials and return user data
    }

    public function email_check($email) {
        // Check if the email is already registered
    }
}
