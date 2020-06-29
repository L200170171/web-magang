<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class A_pengumuman extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_pengumuman');
		}

		public function index()
		{	
			$data = $this->session->level;
			if($data=='Admin'){
				$x ['tampil'] = $this->Model_pengumuman->t_pengumuman();
				$header['judul'] = 'Pengumuman';
				$this->load->view('admin/template/header',$header);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar');
				$this->load->view('admin/pengumuman',$x);
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}

		public function insert(){
			$this->Model_pengumuman->insert();
			redirect('admin/a_pengumuman');
		}

		public function hapus($id){
			$this->Model_pengumuman->hapus($id);
			redirect('admin/a_pengumuman');
		}

		public function update($id){
			$this->Model_pengumuman->update($id);
			redirect('admin/a_pengumuman');
		}
	}
?>