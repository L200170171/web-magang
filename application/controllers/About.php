<?php
	class About extends CI_Controller{
        
        public function index()
        {	
            $header['judul'] = 'About';
            $this->load->view('front/profil',$header);
        }
    }
