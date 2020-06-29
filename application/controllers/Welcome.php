<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct(){
        parent::__construct();

		$this->load->model('Model_agenda');
		$this->load->model('Model_galeri');
	}
	
		public function index(){	
		$header['agenda'] = $this->Model_agenda->sidebar();
		$header['galeri'] = $this->Model_galeri->sidebar();
		$header['judul'] = 'Home';
		$this->load->view('front/index',$header);
	}
}
