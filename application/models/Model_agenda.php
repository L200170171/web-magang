<?php

    class Model_agenda extends CI_model{
        function t_agenda(){
            $query=$this->db->get("tbl_agenda");
            return $query->result_array();
        }

        function insert(){
            $data = [
                "agenda_nama" => $this->input->post("nama",true),
                "agenda_deskripsi" => $this->input->post("deskripsi",true),
                "agenda_mulai" => $this->input->post("mulai",true),
                "agenda_selesai" => $this->input->post("selesai",true),
                "agenda_tempat" => $this->input->post("tempat",true),
                "agenda_waktu" => $this->input->post("waktu",true),
                "agenda_keterangan" => $this->input->post("keterangan",true),
                "agenda_author" => $this->session->un
            ]; 
            $this->db->insert('tbl_agenda',$data);
            $this->session->set_flashdata('pesan','berhasil');
        }

        function hapus($id){
            $this->db->where('agenda_id',$id);
            $this->db->delete('tbl_agenda');
            $this->session->set_flashdata('pesan','hapus');
        }

        function update($id){
            $data = [
                "agenda_nama" => $this->input->post("nama",true),
                "agenda_deskripsi" => $this->input->post("deskripsi",true),
                "agenda_mulai" => $this->input->post("mulai",true),
                "agenda_selesai" => $this->input->post("selesai",true),
                "agenda_tempat" => $this->input->post("tempat",true),
                "agenda_waktu" => $this->input->post("waktu",true),
                "agenda_keterangan" => $this->input->post("keterangan",true),
                "agenda_author" => $this->session->un
            ]; 
            $this->db->where('agenda_id',$id);
            $this->db->update('tbl_agenda',$data);
            $this->session->set_flashdata('pesan','update');
        }

        function get_tabel(){
             //konfigurasi pagination
            $config['base_url'] = site_url('agenda/index'); //site url
            $config['total_rows'] = $this->db->count_all('tbl_agenda'); //total row
            $config['per_page'] = 5;  //show record per halaman
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
            
            $query = $this->db->order_by('agenda_mulai', ' DESC');

            $query = $this->db->get('tbl_agenda', $config["per_page"], $data);
            return $query;
        }

        function sidebar(){
            $query = $this->db->order_by('agenda_mulai', ' DESC');
            $query = $this->db->get('tbl_agenda',3);    
            return $query->result_array();
        }
    }
?>