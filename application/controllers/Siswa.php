<?php
class Siswa extends CI_Controller{
 
    function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
        $this->load->model('Model_siswa');
        
    }

    function index(){
 
        $data['data'] = $this->Model_siswa->get_tabel();           

        $data['pagination'] = $this->pagination->create_links();
        
        $data['judul'] = 'Daftar Siswa';
        $this->load->view('front/siswa',$data);
    }
}
?>
