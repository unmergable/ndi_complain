<?php   
    class Complain extends CI_Controller{

        public function index(){
            $data['complains'] = $this->complain_model->getAll();
            $this->load->view('includes/header');
            $this->load->view('complains/index', $data);
            $this->load->view('includes/footer');
        }

        public function insert(){
            $data = array();
            $this->load->helper(array('form', 'url'));
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $insert_id = $this->complain_model->insert();
                    if(!empty($_FILES)){
                        $this->upload_files($insert_id);
                    }
            }
            $this->load->view('includes/header');
            $this->load->view('complains/formin', $data);
            $this->load->view('includes/footer');
        }

        private function upload_files($insert_id){
            $config = array();
            $data = array();
            $config['upload_path'] = 'application\uploads\complains';
            $config['allowed_types'] = '*';
            $config['max_size']      = '0';
            $config['overwrite']     = FALSE;
        
            $this->load->library('upload');
        
            $files = $_FILES;
            foreach($files as $key => $val){           
                $_FILES[$key]['name']= $val['name'][0];
                $_FILES[$key]['type']= $val['type'][0];
                $_FILES[$key]['tmp_name']= $val['tmp_name'][0];
                $_FILES[$key]['error']= $val['error'][0];
                $_FILES[$key]['size']= $val['size'][0];    
        
                $this->upload->initialize($config);
                if (!$this->upload->do_upload($key)) {
                    $errors = $this->upload->display_errors();
                    echo "<script>alert('$errors')</script>";
                }else{
                    $filename = $val['name'][0];
                    $ex = explode('_', $key);
                    $detail_pair = end($ex);
                    $detail_link = 'detail_'.$detail_pair.'[0]';
                    $file_detail = $this->input->post($detail_link);
                    $file_data = array( 'file_name' => $filename,
                                        'complain_id' => $insert_id,
                                        'file_detail' => $file_detail
                    );
                    $this->db->insert('complain_files', $file_data);
                }
            }
            $this->load->view('includes/header');
            $this->load->view('complains/formin', $data);
            $this->load->view('includes/footer');
        }
    }