<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class A_kelas extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_kelas');
			$this->load->helper('form');
		}

		public function index()
		{
			$data = $this->session->level;
			if($data=='Admin'){
				$x ['tampil'] = $this->Model_kelas->t_kelas();
				$header['judul'] = 'Kelas';
				$this->load->view('admin/template/header',$header);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar');
				$this->load->view('admin/kelas',$x);
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}
		
		public function insert(){
			$this->Model_kelas->insert();
			redirect('admin/a_kelas');
		}
		function hapus($id){
            $this->Model_kelas->hapus($id);
			redirect('admin/a_kelas');
		}
		public function update($id){
			$this->Model_kelas->update($id);
			redirect('admin/a_kelas');
		}
	}
?>