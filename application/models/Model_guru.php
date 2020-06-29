<?php

    class Model_guru extends CI_model{
        function t_guru(){
            $query=$this->db->get("tbl_guru");
            return $query->result_array();
        }

        function hapus_foto($id){
			$query = $this->db->get_where('tbl_guru', array("guru_id" => $id));
        	$results = $query->result_array();
			unlink('./asset/foto/guru/'.($results[0]['guru_photo']));
        }

        function hapus($id){
            $this->db->where('guru_id',$id);
            $this->db->delete('tbl_guru');
            $this->session->set_flashdata('pesan','hapus');
        }

        function rules(){
            return array(
                array(  'field' => 'NIP',
                        'label' => 'NIP',
                        'rules' => "required|trim|numeric"),
        
                array(  'field' => "Nama",
                        'label' => "username",
                        'rules' => "required|trim"),
        
                array(  'field' => "tmp",
                        'label' => "Tempat",
                        'rules' => "required|trim"),
        
                array(  'field' => "tgl",
                        'label' => "Tanggal",
                        'rules' => "required|trim"),

                array(  'field' => "mapel",
                        'label' => "password baru",
                        'rules' => "required|trim"),
            );
        }

        function insert(){
            $cek = $_FILES['foto']['name'];
            $foto = $_FILES['foto'];
            if (empty($cek)){$foto = NULL;}
            else{
                $config['upload_path'] = './asset/foto/guru'; #path penyimpanan folder
                $config['allowed_types'] = 'jpg|png|jpeg'; #ekstensi yang diizinkan
                $config['encrypt_name'] = TRUE; #pengubahan nama file
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto'))
                    {
                        $this->session->set_flashdata('pesan','gagal');
                        redirect('admin/a_guru');
                        die;
                    }
                else
                    {$foto = $this->upload->data('file_name');}
            }
            $data = [
                "guru_nama" => $this->input->post("Nama",true),
                "guru_nip" => $this->input->post("NIP",true),
                "guru_jenkel" => $this->input->post("JK",true),
                "guru_tmp_lahir" => $this->input->post("tmp",true),
                "guru_tgl_lahir" => $this->input->post("tgl",true),
                "guru_mapel" => $this->input->post("mapel",true),
                "guru_photo" => $foto
            ];
            $this->db->insert('tbl_guru',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

        function update($id){
            $cek = $_FILES['foto']['name'];
            $foto = $_FILES['foto'];
            if  (empty($cek))
                {$foto = $this->input->post('fotoa');
                    if($foto===""){
                        $foto = NULL;
                    }
                }
            else{
                $config['upload_path'] = './asset/foto/guru'; #path penyimpanan folder
                $config['allowed_types'] = 'jpg|png|jpeg'; #ekstensi yang diizinkan
                $config['encrypt_name'] = TRUE; #pengubahan nama file
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto'))
                    {
                        $this->session->set_flashdata('pesan','gagal');
                        redirect('admin/a_guru');
                        die;
                    }
                else
                    {
                        $foto = $this->upload->data('file_name');
                    }
                
                    $fotoa = $this->input->post('fotoa');
                    unlink('./asset/foto/guru/'.$fotoa);
                }
            $data = [
                "guru_nama" => $this->input->post("Nama",true),
                "guru_nip" => $this->input->post("NIP",true),
                "guru_jenkel" => $this->input->post("JK",true),
                "guru_tmp_lahir" => $this->input->post("tmp",true),
                "guru_tgl_lahir" => $this->input->post("tgl",true),
                "guru_mapel" => $this->input->post("mapel",true),
                "guru_photo" => $foto
            ];
            $this->db->where('guru_id',$id);
            $this->db->update('tbl_guru',$data);
            $this->session->set_flashdata('pesan','update');
        }

        function get_tabel(){
            //konfigurasi pagination
           $config['base_url'] = site_url('guru/index'); //site url
           $config['total_rows'] = $this->db->count_all('tbl_guru'); //total row
           $config['per_page'] = 12;  //show record per halaman
           $config["uri_segment"] = 3;  // uri parameter
           $choice = $config["total_rows"] / $config["per_page"];
           $config["num_links"] = floor($choice);

           // Membuat Style pagination untuk BootStrap v4
           $config['first_link']       = 'First';
           $config['last_link']        = 'Last';
           $config['next_link']        = 'Next';
           $config['prev_link']        = 'Prev';
           $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
           $config['full_tag_close']   = '</ul></nav></div>';
           $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
           $config['num_tag_close']    = '</span></li>';
           $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
           $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
           $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
           $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
           $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
           $config['prev_tagl_close']  = '</span>Next</li>';
           $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
           $config['first_tagl_close'] = '</span></li>';
           $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
           $config['last_tagl_close']  = '</span></li>';

           $this->pagination->initialize($config);
               
           $data = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

           $query = $this->db->get('tbl_guru', $config["per_page"], $data);
           return $query;
       }
    }
?>