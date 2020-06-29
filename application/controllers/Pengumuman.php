<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class pengumuman extends CI_Controller{

        function __construct(){
			parent::__construct();
            $this->load->model('Model_pengumuman');
            $this->load->library('pagination');
		}

        function index(){
 
            $data['data'] = $this->Model_pengumuman->get_tabel();
            $data['pagination'] = $this->pagination->create_links();            
            $data['judul'] = 'Pengumuman';
            $this->load->view('front/pengumuman',$data);
        }
    }
