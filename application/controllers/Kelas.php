<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Kelas extends CI_Controller{

        function __construct(){
			parent::__construct();
            $this->load->model('Model_kelas');
		}

        function index(){
 
            $data['data'] = $this->Model_kelas->t_kelas();      
            $data['judul'] = 'Daftar Kelas';
            $this->load->view('front/kelas',$data);
        }
    }
