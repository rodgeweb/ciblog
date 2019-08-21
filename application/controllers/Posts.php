<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
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

        if (empty($data['post'])) {
            show_404();
        }

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');

    }

    public function create() {
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
            redirect(base_url()."posts");
        }
    }

    public function delete($id) {
        $this->post_model->delete_post($id);
        redirect('posts');
    }

    public function edit($slug) {
        $query = $this->post_model->get_posts($slug);

        if (empty($query)) {
            show_404();
        }
        foreach($query->result() as $post){
            $data['post'] = $post;
        }

        
        $data['categories'] = $this->post_model->get_categories();

        $data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
    }

    public function update() {
        $this->post_model->update_post();
        redirect('posts');
    }
}
