<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class JenisBarang_model extends CI_Model {
        function __construct()
        {
            parent::__construct();
        }

        public function list($limit, $start)
        {
            $query = $this->db->get('jenisbarang', $limit, $start);
            return ($query->num_rows()>0) ? $query->result() :false;
        }

        public function cari()
	    {
            $cari = $this->input->GET('cari', TRUE);
            $data = $this->db->query("SELECT * from jenisbarang where nama_jenis like '%$cari%' ");
            return $data->result();
	    }

        public function getTotal()
        {
            return $this->db->count_all('jenisbarang');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('jenisbarang', $data);
            return $result;
        }

        public function show($id_jenis)
        {
            $this->db->where('id_jenis', $id_jenis);
            $query = $this->db->get('jenisbarang');
            return $query->row();
        }

        public function update($id_jenis, $data = [])
        {
            $ubah = array(
                'nama_jenis' => $data['nama_jenis']
            );

            $this->db->where('id_jenis', $id_jenis);
            $this->db->update('jenisbarang', $ubah);
        }


        public function delete($id_jenis)
        {
            $this->db->where('id_jenis', $id_jenis);
            $this->db->delete('jenisbarang');
        }
    
    }
    
    /* End of file JenisBarang_model.php */
    