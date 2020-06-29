<?php

    class Model_file extends CI_model{
        function t_file(){
            $query=$this->db->get("tbl_files");
            return $query->result_array();
        }

        function insert(){
            $file = $_FILES['file'];
                $config['upload_path'] = './asset/file/'; #path penyimpanan folder
                $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx'; #ekstensi yang diizinkan
                $config['encrypt_name'] = TRUE; #pengubahan nama file
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file'))
                    {
                        $this->session->set_flashdata('pesan','gagal');
                        redirect('admin/a_file');
                        die;
                    }
                else
                    {$file = $this->upload->data('file_name');}
            $data = [
                "file_judul" => $this->input->post("judul",true),
                "file_deskripsi" => $this->input->post("deskripsi",true),
                "file_data" => $file,
                "file_oleh" => $this->input->post("author",true)
            ];
            $this->db->insert('tbl_files',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

        function update($id){
            $file = $_FILES['file'];
            $cek = $_FILES['file']['name'];

            if(empty($cek)){
                $file = $this->input->post('filea');
            }
            else{            
                $config['upload_path'] = './asset/file/'; #path penyimpanan folder
                $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx'; #ekstensi yang diizinkan
                $config['encrypt_name'] = TRUE; #pengubahan nama file
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file'))
                    {
                        $this->session->set_flashdata('pesan','gagal');
                        redirect('admin/a_file');
                        die;
                    }
                else{
                        $file = $this->upload->data('file_name');
                    }
                $filea = $this->input->post('filea');
                unlink('./asset/file/'.$filea);
            }
            $data = [
                "file_judul" => $this->input->post("judul",true),
                "file_deskripsi" => $this->input->post("deskripsi",true),
                "file_data" => $file,
                "file_oleh" => $this->input->post("author",true)
            ];
            $this->db->where('file_id',$id);
            $this->db->update('tbl_files',$data);
            $this->session->set_flashdata('pesan','update');
        }

        function hapus($id){
            $this->db->where('file_id',$id);
            $this->db->delete('tbl_files');
            $this->session->set_flashdata('pesan','hapus');
        }

        function hapus_file($id){
			$query = $this->db->get_where('tbl_files', array("file_id" => $id));
            $results = $query->result_array();
            unlink('./asset/file/'.($results[0]['file_data']));
        }

        function unduh($id){
            $query = $this->db->get_where('tbl_files', array("file_id" => $id));
            $results = $query->result_array();
            force_download('./asset/file/'.($results[0]['file_data']),null);
        }

    }
?>