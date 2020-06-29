<?php

    class Model_login extends CI_model{
        public function cek(){
            $un = $this->input->post('UN');
            $pw = $this->input->post('PW');

            $user = $this->db->get_where('tbl_pengguna',['pengguna_username'=>$un])->row_array();
            if($user){
                if($pw == $user['pengguna_password']){
                    $data=[
                        'un' => $user['pengguna_nama'],
                        'gambar' => $user['pengguna_photo'],
                        'level' => $user['pengguna_level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                }
                else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">The username or password is incorrect!</div>');
                    redirect('login');
                }
            }
            else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Your account is not registered!</div>');
                redirect('login');
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('login');
        }
    }
?>