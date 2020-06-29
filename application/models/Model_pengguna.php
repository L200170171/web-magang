<?php

    class Model_pengguna extends CI_model{
        function t_pengguna(){
            $query=$this->db->get("tbl_pengguna");
            return $query->result_array();
        }

        function rules_insert(){
            return array(
                array(  'field' => 'Nama',
                        'label' => 'Nama',
                        'rules' => "required|trim"),
        
                array(  'field' => "UN",
                        'label' => "username",
                        'rules' => "required|trim"),
        
                array(  'field' => "HP",
                        'label' => "phone number",
                        'rules' => "required|trim|numeric"),
        
                array(  'field' => "PW",
                        'label' => "password",
                        'rules' => "required|trim|matches[UPW]|min_length[8]"),
        
                array(  'field' => "UPW",
                        'label' => "re-password",
                        'rules' => "required|trim|matches[PW]"),
            );
        }

        function rules_update(){
            return array(
                array(  'field' => 'Nama',
                        'label' => 'Nama',
                        'rules' => "required|trim"),
        
                array(  'field' => "UN",
                        'label' => "username",
                        'rules' => "required|trim"),
        
                array(  'field' => "HP",
                        'label' => "phone number",
                        'rules' => "required|trim|numeric"),
        
                array(  'field' => "UPW",
                        'label' => "re-password",
                        'rules' => "required|trim"),

                array(  'field' => "PWB",
                        'label' => "password baru",
                        'rules' => "trim|min_length[8]"),
            );
        }

        function insert(){
                $cek = $_FILES['foto']['name'];
                $foto = $_FILES['foto'];
                if (empty($cek)){$foto = "default.jpg";}
                else{
                    $config['upload_path'] = './asset/foto/pengguna'; #path penyimpanan folder
                    $config['allowed_types'] = 'jpg|png|jpeg'; #ekstensi yang diizinkan
                    $config['encrypt_name'] = TRUE; #pengubahan nama file
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('foto'))
                        {
                            $this->session->set_flashdata('pesan','gagal');
                            redirect('admin/a_pengguna');
                        }
                    else
                        {$foto = $this->upload->data('file_name');}
                }
                $data = [
                    "pengguna_nama" => $this->input->post("Nama",true),
                    "pengguna_username" => $this->input->post("UN",true),
                    "pengguna_password" => $this->input->post("PW"),
                    "pengguna_nohp" => $this->input->post("HP",true),
                    "pengguna_level" => $this->input->post("level",true),
                    "pengguna_photo" => $foto
                ];
                $this->db->insert('tbl_pengguna',$data);
                $this->session->set_flashdata('pesan','berhasil');
        }

        function hapus($id){
            $this->db->where('pengguna_id',$id);
            $this->db->delete('tbl_pengguna');
            $this->session->set_flashdata('pesan','hapus');
        }

        function hapus_foto($id){
			$query = $this->db->get_where('tbl_pengguna', array("pengguna_id" => $id));
            $results = $query->result_array();
            if($results[0]['pengguna_photo'] != "default.jpg"){
                unlink('./asset/foto/pengguna/'.($results[0]['pengguna_photo']));
            }
        }
     
        function update($id){
            if($this->cekpw($id)=== TRUE){
                $pwb = $this->input->post("PWB",true);
                $cek = $_FILES['fotoe']['name'];
                $foto = $_FILES['fotoe'];
                if (empty($pwb)){
                    $pwb = $this->input->post("UPW",true);
                }
                if  (empty($cek))
                    {$foto = $this->input->post('fotoa');
                        if($foto==""){
                            $foto = "default.jpg";
                        }
                    }
                else{
                    $config['upload_path'] = './asset/foto/pengguna'; #path penyimpanan folder
                    $config['allowed_types'] = 'jpg|png|jpeg'; #ekstensi yang diizinkan
                    $config['encrypt_name'] = TRUE; #pengubahan nama file
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('fotoe'))
                        {
                            $this->session->set_flashdata('pesan','gagal');
                            redirect('admin/a_pengguna');
                        }
                    else
                        {
                            $foto = $this->upload->data('file_name');
                        }
                    }
                $fotoa = $this->input->post('fotoa');
                if($fotoa != 'default.jpg'){
                    unlink('./asset/foto/pengguna/'.$fotoa);
                }
                $data = [
                    "pengguna_nama" => $this->input->post("Nama",true),
                    "pengguna_username" => $this->input->post("UN",true),
                    "pengguna_password" => $pwb,
                    "pengguna_nohp" => $this->input->post("HP",true),
                    "pengguna_level" => $this->input->post("level",true),
                    "pengguna_photo" => $foto
                ];
                $this->db->where('pengguna_id',$id);
                $this->db->update('tbl_pengguna',$data);
                $this->session->set_flashdata('pesan','update');
            }
            else{
                $this->session->set_flashdata('pesan','gagal');
                $this->session->set_flashdata('pass','password salah');
            }
        }

        function cekpw($id){
            $pw = $this->input->post("UPW",true);
            $query = $this->db->get_where('tbl_pengguna', array("pengguna_id" => $id));
            $results = $query->result_array();
            if($pw == $results[0]['pengguna_password']){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
?>