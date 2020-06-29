<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class login extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('Model_login');
		}

		private function cek(){
			$this->Model_login->cek();
		}

		public function keluar(){
			$this->Model_login->logout();
		}

		public function index()
		{	
			$this->form_validation->set_rules("UN","username","required|trim");
			$this->form_validation->set_rules("PW","password","required|trim");
			if($this->form_validation->run()==false){
			$header['judul'] = 'Login';
				$this->load->view('login/template/header',$header);
				$this->load->view('login/login');
				$this->load->view('login/template/footer');
			}
			else{
				$this->cek();
			}
		}
	}
?>