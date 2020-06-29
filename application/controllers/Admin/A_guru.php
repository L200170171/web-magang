<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class A_guru extends CI_Controller	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Model_guru');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data = $this->session->level;
			if($data=='Admin'){
				$x ['tampil'] = $this->Model_guru->t_guru();
				$header['judul'] = 'Guru';
				$this->load->view('admin/template/header',$header);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/sidebar');
				$this->load->view('admin/guru',$x);
				$this->load->view('admin/template/footer');
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
				You must sign in with your account to access this page</div>');
				redirect('login');
			}
		}
		public function insert(){
			$this->form_validation->set_rules($this->Model_guru->rules());
			if($this->form_validation->run()==false){
				$this->session->set_flashdata('pesan','gagal');
				$this->session->set_flashdata('nip', form_error('NIP','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('nama', form_error('Nama','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('tmp', form_error('tmp','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('tgl', form_error('tgl','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('mapel', form_error('mapel','<p class="text-danger col-md-auto">','</p>'));
				redirect('admin/a_guru');
			}
			else{
				$this->session->set_flashdata('pesan','berhasil');
				$this->Model_guru->insert();
				redirect('admin/a_guru');
			}
		}
		
		public function update($id){
			$this->form_validation->set_rules($this->Model_guru->rules());
			if($this->form_validation->run()==false){
				$this->session->set_flashdata('pesan','gagal');
				$this->session->set_flashdata('nip', form_error('NIP','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('nama', form_error('Nama','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('tmp', form_error('tmp','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('tgl', form_error('tgl','<p class="text-danger col-md-auto">','</p>'));
				$this->session->set_flashdata('mapel', form_error('mapel','<p class="text-danger col-md-auto">','</p>'));
				redirect('admin/a_guru');
			}
			else{
				$this->session->set_flashdata('pesan','berhasil');
				$this->Model_guru->update($id);
				redirect('admin/a_guru');
			}
		}

		public function hapusdata($id){
			$this->Model_guru->hapus_foto($id);
			$this->Model_guru->hapus($id);
			$this->session->set_flashdata('pesan','hapus');
			redirect('admin/a_guru');
		}
	}
?>
