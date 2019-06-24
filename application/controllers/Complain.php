<?php   
    class Complain extends CI_Controller{

        public function index(){
            $data['complains'] = $this->complain_model->getAll();
            $this->load->view('includes/header');
            $this->load->view('complains/formin', $data);
            $this->load->view('includes/footer');
        }

        public function insert(){
                $data = array();
                $countfiles = count($_FILES['files']['name']);
                for($i=0;$i<$countfiles;$i++){
                    
                    if(!empty($_FILES['files']['name'][$i])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                        // Set preference
                        $config['upload_path'] = 'assets/images/complain/';	
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size']    = '5000';	// max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
                            
                        //Load upload library
                        $this->load->library('upload',$config);			
                        
                        // File upload
                        if($this->upload->do_upload('file')){
                            // Get data about the file
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];

                            // Initialize array
                            $data['filenames'][] = $filename;
                        }
                    }     
                }
                // load view
                $this->load->view('user_view',$data);

    }