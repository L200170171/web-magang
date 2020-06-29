<?php

    class Model_pengumuman extends CI_model{
        function t_pengumuman(){
            $query=$this->db->get("tbl_pengumuman");
            return $query->result_array();
        }

        function get_tabel(){
            //konfigurasi pagination
            $config['base_url'] = site_url('pengumuman/index'); //site url
            $config['total_rows'] = $this->db->count_all('tbl_pengumuman'); //total row
            $config['per_page'] = 6;  //show record per halaman
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

            $query = $this->db->order_by('pengumuman_tanggal', ' DESC');

            $query = $this->db->get('tbl_pengumuman', $config["per_page"], $data);
            return $query;
        }

        function insert(){
            $data = [
                "pengumuman_judul" => $this->input->post("judul",true),
                "pengumuman_deskripsi" => $this->input->post("deskripsi",true),
                "pengumuman_author" => $this->session->un
            ]; 
            $this->db->insert('tbl_pengumuman',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

        function hapus($id){
            $this->db->where('pengumuman_id',$id);
            $this->db->delete('tbl_pengumuman');
            $this->session->set_flashdata('pesan','hapus');
        }

        function update($id){
            $data = [
                "pengumuman_judul" => $this->input->post("judul",true),
                "pengumuman_deskripsi" => $this->input->post("deskripsi",true),
                "pengumuman_author" => $this->session->un
            ];
            $this->db->where('pengumuman_id',$id);
            $this->db->update('tbl_pengumuman',$data);
            $this->session->set_flashdata('pesan','update');
        }

    }
?>