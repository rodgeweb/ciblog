<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function get_posts($slug = FALSE)
	{
        if ($slug === FALSE) {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get("posts");
            return $query;
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query;
        
    }
    
    public function create_post($post_image) {
        $slug = strtolower(url_title($this->input->post('title')));

        $data = array(
            "title"             => $this->input->post('title'),
            "slug"              => $slug,
            "body"              => $this->input->post('body'),
            "category_id"       => $this->input->post('category_id'),
            "post_image"        => $post_image
        );

        $query = $this->db->insert('posts', $data);
        return $query;
    }

    public function delete_post($id) {
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function update_post() {
        $slug = strtolower(url_title($this->input->post('title')));

        $data = array(
            "title"     => $this->input->post('title'),
            "slug"      => $slug,
            "body"      => $this->input->post('body'),
            "category_id"       => $this->input->post('category_id')
        );

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $query = $this->db->update('posts', $data);
        return $query;
    }

    public function get_categories() {
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query;
    }
}
