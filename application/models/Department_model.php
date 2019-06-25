<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function insert(){
        $data = array(
            'name' => $this->input->post('name'),
            'detail' => $this->input->post('detail')
        );

        $this->db->insert('departments', $data);
    }

    public function getAll(){
        $this->db->order_by('id');
        $query = $this->db->get('departments');
        return $query->result_array();
    }
}