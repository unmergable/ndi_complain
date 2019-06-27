<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Complain_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function insert(){
        $data = array(
            'name' => $this->input->post('name'),
            'nat_id' => $this->input->post('nat_id'),
            'tel' => $this->input->post('tel'),
            'email' => $this->input->post('email'),
            'addr' => $this->input->post('addr'),
            'cp_place' => $this->input->post('place'),
            'cp_type_id' => $this->input->post('type'),
            'cp_detail' => $this->input->post('detail')
        );

        $this->db->insert('complains', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getAll(){
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('complains');
        return $query->result_array();
    }

    public function get($id){
        $this->db->where('complains.id', $id);
        $complain = $this->db->get('complains');
        $this->db->where('complain_files.complain_id', $id);
        $files = $this->db->get('complain_files');
        return array(
            'complain' => $complain->result_array(),
            'files' => $files->result_array()
        );
    }
}