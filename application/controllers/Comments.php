<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('comments_model');
    }

    public function create($post_id) {
        $slug = $this->input->post('slug');
        $data['post'] = $this->post_model->get_posts($slug);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }else {
            $this->comments_model->create_comment($post_id);

            // Set message
            $this->session->set_flashdata('new_comment', 'Your comment has been submitted!');
            redirect('posts/view'.$slug);
        }
    }

}