<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller	{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function index()
		{
			$data = $this->session->level;
			if($data=='Admin'){
				$this->load->database();
				$header['judul'] = 'Dashboard';
				$this->load->view('admin/template/header');
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar',$header);
				$this->load->view('admin/index');
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}
	}
?>