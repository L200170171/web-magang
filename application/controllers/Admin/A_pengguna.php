<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class A_pengguna extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_pengguna');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index()
		{	
			$data = $this->session->level;
			if($data=='Admin'){
				$x ['tampil'] = $this->Model_pengguna->t_pengguna();
				$header['judul'] = 'Pengguna';
				$this->load->view('admin/template/header',$header);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar');
				$this->load->view('admin/pengguna',$x);
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}
		public function insert(){
			$this->form_validation->set_rules($this->Model_pengguna->rules_insert());
			if($this->form_validation->run()==false){
				$this->session->set_flashdata('pesan','gagal');
				$this->session->set_flashdata('nama', form_error('Nama','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('un', form_error('UN','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('pw', form_error('PW','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('hp', form_error('HP','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('pw2', form_error('UPW','<p class="text-danger col-md-auto">','</p>'));
				redirect('admin/a_pengguna');
			}
			else{
				$this->Model_pengguna->insert();
				$this->session->set_flashdata('pesan','berhasil');
				redirect('admin/a_pengguna');
			}
		}
		
		public function update($id){
			$this->form_validation->set_rules($this->Model_pengguna->rules_update());
			if($this->form_validation->run()==false){
				$this->session->set_flashdata('pesan','gagal');
				$this->session->set_flashdata('nama', form_error('Nama','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('un', form_error('UN','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('upw', form_error('UPW','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('hp', form_error('HP','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('pwb', form_error('PWB','<p class="text-danger col-md-auto">','</p>'));
				redirect('admin/a_pengguna');
			}
			else{
				$this->Model_pengguna->update($id);
				redirect('admin/a_pengguna');
			}
		}

		public function hapusdata($id){
			$this->Model_pengguna->hapus_foto($id);
			$this->Model_pengguna->hapus($id);
			$this->session->set_flashdata('pesan','hapus');
			redirect('admin/a_pengguna');
			
		}
	}
?>