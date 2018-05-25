<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Barang extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->library('form_validation');
		    $this->load->library('pagination');
            $this->load->model('Barang_model');
        }

        public function index()
        {
            $barang = $this->Barang_model->get_jenisbarang();
            $data = [];
            $total = $this->Barang_model->getTotal();

            if ($total > 0) {
                $limit = 2;
                $start = $this->uri->segment(3, 0);

                $config = [
                    'base_url' => base_url() . 'barang/index',
                    'total_rows' => $total,
                    'per_page' => $limit,
                    'uri_segment' => 3,

                    // Bootstrap 3 Pagination
                    'first_link' => '&laquo;',
                    'last_link' => '&raquo;',
                    'next_link' => 'Next',
                    'prev_link' => 'Prev',
                    'full_tag_open' => '<ul class="pagination">',
                    'full_tag_close' => '</ul>',
                    'num_tag_open' => '<li>',
                    'num_tag_close' => '</li>',
                    'cur_tag_open' => '<li class="active"><span>',
                    'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                    'next_tag_open' => '<li>',
                    'next_tag_close' => '</li>',
                    'prev_tag_open' => '<li>',
                    'prev_tag_close' => '</li>',
                    'first_tag_open' => '<li>',
                    'first_tag_close' => '</li>',
                    'last_tag_open' => '<li>',
                    'last_tag_close' => '</li>',
                ];
                $this->pagination->initialize($config);

                $data = [
                    'results' => $this->Barang_model->list($limit, $start),
                    'links' => $this->pagination->create_links(),
                    'barang' => $barang,
                ];
            }

            $this->load->view('barang/index', $data);
        }
        
        public function cari() 
        {
            $this->load->view('barang/index');
        }
    
        public function hasil()
        {
            $barang = $this->Barang_model->get_jenisbarang();
            $cari = $this->Barang_model->cari();
            $data2 = [
                'barang' => $barang,
                'cari' => $cari
            ];
            $this->load->view('barang/searchresult', $data2);
        }

        public function create()
        {
            $barang = $this->Barang_model->get_jenisbarang();
            $dataBarang = ['dataBarang' => $barang];
            $this->load->view('barang/create', $dataBarang);
        }

        public function store()
        {
            $data = ['nama_barang' => $this->input->post('nama_barang'),
                    'jenis_barang'  => $this->input->post('jenis_barang'),
                    'harga_satuan' => $this->input->post('harga_satuan'),
                    'stok_barang'  => $this->input->post('stok_barang'),
                    'keterangan'  => $this->input->post('keterangan')
                    ];
            $rules = [
                [
                'field' => 'nama_barang',
                'label' => 'nama_jenis',
                'rules' => 'trim|required'
                ]
            ];
            
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run()) {
                $result = $this->Barang_model->insert($data);
                if ($result) {
                    redirect('barang');
                }
            } else {
                redirect('barang/create');
            }
        }

        public function show($id_barang)
        {
            $barang= $this->Barang_model->show($id_barang);
            $data = ['data' => $barang];
            $data['barang'] = $this->Barang_model->get_jenisbarang();
            $this->load->view('barang/show', $data);
        }

        public function edit($id_barang)
        {
            $jenisbarang = $this->Barang_model->get_jenisbarang();
            $barang = $this->Barang_model->show($id_barang);
            $data = [
                'data' => $barang,
                'jenisbarang' => $jenisbarang
            ];
            $this->load->view('barang/edit', $data);
        }
    
        public function update($id_barang)
        {
            // TODO: implementasi update data berdasarkan $id
            $id_barang = $this->input->post('id_barang');
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'jenis_barang' => $this->input->post('jenis_barang'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                'stok_barang' => $this->input->post('stok_barang'),
                'keterangan' => $this->input->post('keterangan')
            );

            $this->Barang_model->update($id_barang, $data);
            redirect('barang');
        }
    
        public function destroy($id_barang)
        {
            $this->Barang_model->delete($id_barang);
            redirect('barang');
        }
    }
    
    /* End of file Barang.php */
    