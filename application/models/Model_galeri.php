<?php

    class Model_galeri extends CI_model{
        function t_galeri(){
            $query=$this->db->get("tbl_galeri");
            return $query->result_array();
        }

        function insert(){
            $foto = $_FILES['foto'];
                $config['upload_path'] = './asset/foto/galeri'; #path penyimpanan folder
                $config['allowed_types'] = 'jpg|png|jpeg'; #ekstensi yang diizinkan
                $config['encrypt_name'] = TRUE; #pengubahan nama file
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto'))
                    {
                        $this->session->set_flashdata('pesan','gagal');
                        redirect('admin/a_galeri');
                        die;
                    }
                else
                    {$foto = $this->upload->data('file_name');}
            $data = [
                "galeri_judul" => $this->input->post("judul",true),
                "galeri_gambar" => $foto,
                "galeri_author" => $this->session->un
            ];
            $this->db->insert('tbl_galeri',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

        function update($id){
            $foto = $_FILES['foto'];
            $cek = $_FILES['foto']['name'];

            if(empty($cek)){
                $foto = $this->input->post('fotoa');
            }
            else{            
                $config['upload_path'] = './asset/foto/galeri'; #path penyimpanan folder
                $config['allowed_types'] = 'jpg|png|jpeg'; #ekstensi yang diizinkan
                $config['encrypt_name'] = TRUE; #pengubahan nama file
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('foto'))
                    {
                        $this->session->set_flashdata('pesan','gagal');
                        redirect('admin/a_galeri');
                        die;
                    }
                else{
                        $foto = $this->upload->data('file_name');
                    }
                $fotoa = $this->input->post('fotoa');
                unlink('./asset/foto/galeri/'.$fotoa);
            }
            $data = [
                "galeri_judul" => $this->input->post("judul",true),
                "galeri_gambar" => $foto,
                "galeri_author" => $this->session->un
            ];
            $this->db->where('galeri_id',$id);
            $this->db->update('tbl_galeri',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

        function hapus($id){
            $this->db->where('galeri_id',$id);
            $this->db->delete('tbl_galeri');
            $this->session->set_flashdata('pesan','hapus');
        }

        function hapus_foto($id){
			$query = $this->db->get_where('tbl_galeri', array("galeri_id" => $id));
            $results = $query->result_array();
            unlink('./asset/foto/galeri/'.($results[0]['galeri_gambar']));
        }

        function sidebar(){
            $query = $this->db->order_by('galeri_tanggal', 'ASC');
            $query = $this->db->get('tbl_galeri',4);    
            return $query->result_array();
        }

    }
?>