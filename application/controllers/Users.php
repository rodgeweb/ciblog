<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function register() {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm', 'required|matches[password]');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        }else {
            //encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->user_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
            redirect('posts');
        }
    }
    public function login() {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        }else {

            // Get Username
            $username = $this->input->post('username');

            //encrypt password
            $enc_password = md5($this->input->post('password'));

            $user_id = $this->user_model->login($username, $enc_password);

            if($user_id) {
                // Create Session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set Message
                $this->session->set_flashdata('user_logged_in', 'You are now log in');
                redirect('posts/create');
            }else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Fail to login');
                redirect('users/login');
            }
        }
    }

    public function logout() {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set Message
        $this->session->set_flashdata('user_logged_out', 'You are now logged out');

        // Reidrect to login form
        redirect('users/login');
    }

    public function check_username_exists($username) {
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');

        if($this->user_model->check_username_exists($username)) {
            return true;
        }else {
            return false;
        }

    }
    public function check_email_exists($email) {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');

        if($this->user_model->check_email_exists($email)) {
            return true;
        }else {
            return false;
        }

    }

}
