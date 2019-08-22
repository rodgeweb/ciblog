<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function create_category() {
        $data = array(
            'name' => $this->input->post('name')
        );

        $query = $this->db->insert('categories', $data);

        return $query;
    }

    public function get_categories() {
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query;
    }

    public function get_category($id) {
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }

}