<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Complain_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function insert($cp_image){
        $data = array(
            'name' => ucfirst($this->input->post('name')),
            'nat_id' => $this->input->post('nat_id'),
            'tel' => $this->input->post('tel'),
            'email' => $this->input->post('email'),
            'addr' => $this->input->post('addr'),
            'addr' => $this->input->post('addr'),
            'cp_type_id' => $this->input->post('cp_type_id'),
            'cp_detail' => $this->input->post('cp_detail')
        );

        $this->db->insert('complains', $data);
    }

    public function getAll(){
        $this->db->order_by('id');
        $query = $this->db->get('complains');
        return $query->result_array();
    }
}