<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Barang_model extends CI_Model {
    
        public function list($limit, $start)
        {
            $query = $this->db->get('barang', $limit, $start);
            return ($query->num_rows()>0) ? $query->result() :false;
        }

        public function getTotal()
        {
            return $this->db->count_all('barang');
        }

        public function cari()
	    {
            $cari = $this->input->GET('cari', TRUE);
            $data = $this->db->query("SELECT * from barang where nama_barang like '%$cari%' ");
            return $data->result();
	    }

        public function insert($data = [])
        {
            $result = $this->db->insert('barang', $data);
            return $result;
        }

        public function show($id_barang)
        {
            $this->db->where('id_barang', $id_barang);
            $query = $this->db->get('barang');
            return $query->row();
        }

        public function update($id_barang, $data = [])
        {
            $ubah = array(
                'jenis_barang' => $data['jenis_barang'],
                'nama_barang' => $data['nama_barang'],
                'harga_satuan' => $data['harga_satuan'],
                'stok_barang' => $data['stok_barang'],
                'keterangan' => $data['keterangan']
            );

            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang', $ubah);
        }


        public function delete($id_barang)
        {
            $this->db->where('id_barang', $id_barang);
            $this->db->delete('barang');
        }

        public function get_jenisbarang()
        {
            $query = $this->db->get('jenisbarang');
            return $query->result();
        }
    }
    
    /* End of file Barang_model.php */
    