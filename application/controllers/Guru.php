<?php
class Guru extends CI_Controller{
 
    function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Model_guru');
    }

    function index(){
        $data['data'] = $this->Model_guru->get_tabel();
        $data['pagination'] = $this->pagination->create_links();
        $data['judul'] = 'Daftar Guru';
        $this->load->view('front/guru',$data);
    }
}
?>
