<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class A_file extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_file');
		}

		public function index()
		{	
			$data = $this->session->level;
			if($data=='Admin'){
				$x ['tampil'] = $this->Model_file->t_file();
				$header['judul'] = 'File';
				$this->load->view('admin/template/header',$header);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar');
				$this->load->view('admin/file',$x);
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}

		public function insert(){
			$this->Model_file->insert();
			redirect('admin/a_file');
		}

		public function hapus($id){
			$this->Model_file->hapus_file($id);
			$this->Model_file->hapus($id);
			redirect('admin/a_file');
		}

		public function update($id){
			$this->Model_file->update($id);
			redirect('admin/a_file');
		}
	}
?>