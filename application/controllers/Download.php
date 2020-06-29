<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Download extends CI_Controller{

        function __construct(){
			parent::__construct();
            $this->load->model('Model_file');
            $this->load->helper(array('url','download'));
		}

        function index(){
 
            $data['data'] = $this->Model_file->t_file();        
            $data['judul'] = 'Materi';
            $this->load->view('front/materi',$data);
        }

        function unduh($id){
            $this->Model_file->unduh($id);
        }
    }
