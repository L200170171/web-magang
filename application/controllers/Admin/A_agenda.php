<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class A_agenda extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_agenda');
		}

		public function index()
		{	
			$data = $this->session->level;
			if($data=='Admin'){
			$x ['tampil'] = $this->Model_agenda->t_agenda();
			$header['judul'] = 'Agenda';
			$this->load->view('admin/template/header',$header);
			$this->load->view('admin/template/navbar');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/agenda',$x);
			$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}

		public function insert(){
			$this->Model_agenda->insert();
			redirect('admin/a_agenda');
		}

		public function hapus($id){
			$this->Model_agenda->hapus($id);
			redirect('admin/a_agenda');
		}

		public function update($id){
			$this->Model_agenda->update($id);
			redirect('admin/a_agenda');
	}
	}
?>