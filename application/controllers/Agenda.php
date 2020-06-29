<?php
class Agenda extends CI_Controller{
 
    function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');

        $this->load->model('Model_agenda');
        
    }

    function index(){
 
        $data['data'] = $this->Model_agenda->get_tabel();           

        $data['pagination'] = $this->pagination->create_links();
        
        $data['judul'] = 'Agenda';
        $this->load->view('front/agenda',$data);
    }
}
?>
