<?php

    class Model_kelas extends CI_model{
        function t_kelas(){
            $query=$this->db->get("tbl_kelas");
            return $query->result_array();
        }
        
        function insert(){
            $data = [
                "kelas_id" => $this->input->post("ID",true),
                "kelas_nama" => $this->input->post("Nama",true),
                "kelas_jumlah_siswa" => $this->input->post("jumlah",true),
            ];
            $this->db->insert('tbl_kelas',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

		function hapusdata($id){
            $this->db->where('kelas_id',$id);
            $this->db->delete('tbl_kelas');
			redirect('admin/a_pengguna');
            $this->session->set_flashdata('pesan','hapus');
        }

        function update($id){
            $data = [
                "kelas_nama" => $this->input->post("Nama",true),
                "kelas_jumlah_siswa" => $this->input->post("jumlah",true),
            ];
            $this->db->where('kelas_id',$id);
            $this->db->update('tbl_kelas',$data);
            $this->session->set_flashdata('pesan','update');
        }
    }
?>