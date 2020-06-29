<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class A_galeri extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_galeri');
		}

		public function index()
		{	
			$data = $this->session->level;
			if($data=='Admin'){
				$x ['tampil'] = $this->Model_galeri->t_galeri();
				$header['judul'] = 'Galeri';
				$this->load->view('admin/template/header',$header);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar');
				$this->load->view('admin/galeri',$x);
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}
		function hapus($id){
			$this->Model_galeri->hapus_foto($id);
			$this->Model_galeri->hapus($id);
			redirect('admin/a_galeri');
		}

		function insert(){
			$this->Model_galeri->insert();
			redirect('admin/a_galeri');
		}

		function update($id){
			$this->Model_galeri->update($id);
			redirect('admin/a_galeri');
		}
	}
?>