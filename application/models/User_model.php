<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function register($enc_password) {
        // Use data array
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'zip_code' => $this->input->post('zipcode')
        );

        // Insert User
        $this->db->insert('users', $data);
    }

    public function login($username, $enc_password) {
        // Use data array
        // $data = array(
        //     'username' => $this->input->post('username'),
        //     'password' => $enc_password
        // );

        // Insert User
        // return $this->db->get_where('users', array(
        //     'username' => $username,
        //     'password' => $enc_password
        // ));
        $this->db->where('username', $username);
        $this->db->where('password', $enc_password);

        $result = $this->db->get('users');

        if($result->row() == 1) {
            return $result->row(0)->id;
        }else {
            return false;
        }
    }

    public function check_username_exists($username) {
        $query = $this->db->get_where('users', array('username' => $username));

        if(empty($query->row())) {
            return true;
        }else {
            return false;
        }
    }

    public function check_email_exists($email) {
        $query = $this->db->get_where('users', array('email' => $email));

        if(empty($query->row())) {
            return true;
        }else {
            return false;
        }
    }
}