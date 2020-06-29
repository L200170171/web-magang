<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Galeri extends CI_Controller{

        function __construct(){
			parent::__construct();
            $this->load->model('Model_galeri');
		}

        function index(){
			$data['data'] = $this->Model_galeri->t_galeri();
            $data['judul'] = 'Galeri';
            $this->load->view('front/galeri',$data);
        }
    }
