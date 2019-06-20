<?php   
    class Complain extends CI_Controller{

        public function index(){
            $data['complains'] = $this->complain_model->getAll();
            $this->load->view('includes/header');
            $this->load->view('complains/formin', $data);
            $this->load->view('includes/footer');
        }

        public function insert(){
            $this->complain_model->insert();

            //upload image
            $config['upload_path'] = './assets/images/complain';
            //$config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '20480';
            $config['max_width'] = '2500';
            $config['max_height'] = '2500';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $cp_image = 'noimage.png';
            }else{
                $data = array('upload_data' => $this->upload->data());
                $cp_image = $_FILES['userfile']['name'];
            }
            $this->complain_model->insert($cp_image);
            redirect('/complain');
        }

    }