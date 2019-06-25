<?php   
    class Department extends CI_Controller{

        function __construct() {
            parent::__construct();
            $this->load->model('department_model');
        }

        public function index(){
            $data['departments'] = $this->department_model->getAll();
            $this->load->helper(array('form', 'url'));
            $this->load->view('includes/header');
            $this->load->view('department/index', $data);
            $this->load->view('includes/footer');
        }

        public function insert(){
            $this->department_model->insert();
            redirect('department');
        }

        public function remove(){
            
        }
    }