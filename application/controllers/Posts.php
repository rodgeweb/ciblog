<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('comments_model');
    }

	public function index()
	{

        $data['title'] = "Latest Post";

        $data['posts'] = $this->post_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
    }
    
    public function view($slug = NULL) {
        $data['post'] = $this->post_model->get_posts($slug);

        $data['comments'] = $this->comments_model->get_comments($data['post']->id);
        

        if (empty($data['post'])) {
            show_404();
        }

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

    }

    public function create() {

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = "Create New Post";

        $data['categories'] = $this->post_model->get_categories();

        $this->form_validation->set_rules("title", "Title", "required");
        $this->form_validation->set_rules("body", "Body", "required");

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        }else {
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            // $config['max_width'] = '500';
            // $config['max_height'] = '500';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
                
            }else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);

            // Set message
            $this->session->set_flashdata('post_created', 'New post has been created');
            redirect(base_url()."posts");
        }
    }

    public function delete($id) {

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->post_model->delete_post($id);

        // Set message
        $this->session->set_flashdata('post_deleted', 'Post has been deleted');
        redirect('posts');
    }

    public function edit($slug) {
        
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        //Check user
        if ($this->session->userdata('user_id') != $data['post']->user_id) {
            redirect('posts');
        }

        
        $data['categories'] = $this->post_model->get_categories();

        $data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
    }

    public function update() {
        
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->post_model->update_post();

        // Set message
        $this->session->set_flashdata('post_updated', 'Post has been updated');
        redirect('posts');
    }
}
