<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class JenisBarang extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->library('form_validation');
		    $this->load->library('pagination');
            $this->load->model('JenisBarang_model');
        }

        public function index()
        {
            $data = [];
            $total = $this->JenisBarang_model->getTotal();

            if ($total > 0) {
                $limit = 2;
                $start = $this->uri->segment(3, 0);

                $config = [
                    'base_url' => base_url() . 'jenisbarang/index/',
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
                    'results' => $this->JenisBarang_model->list($limit, $start),
                    'links' => $this->pagination->create_links(),
                ];
            }

            $this->load->view('jenisbarang/index', $data);
        }

        public function cari() 
        {
            $this->load->view('jenisbarang/index');
        }
    
        public function hasil()
        {
            $data2['cari'] = $this->JenisBarang_model->cari();
            $this->load->view('jenisbarang/searchresult', $data2);
        }
        
        public function create()
        {
            $this->load->view('jenisbarang/create');
        }

        public function store()
        {
            $data = ['nama_jenis' => $this->input->post('nama_jenis')];
            $rules = [
                [
                'field' => 'nama_jenis',
                'label' => 'nama_jenis',
                'rules' => 'trim|required'
                ]
            ];
            
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run()) {
                $result = $this->JenisBarang_model->insert($data);
                if ($result) {
                    redirect('jenisbarang');
                }
            } else {
                redirect('jenisbarang/create');
            }
        }

        public function show($id_jenis)
        {
            $jenis_barang= $this->JenisBarang_model->show($id_jenis);
            $data = [
                'data' => $jenis_barang
            ];
            $this->load->view('jenisbarang/show', $data);
        }

        public function edit($id_jenis)
        {
            $jenis_barang = $this->JenisBarang_model->show($id_jenis);
            $data = [
                'data' => $jenis_barang
            ];
            $this->load->view('jenisbarang/edit', $data);
        }
    
        public function update($id_jenis)
        {
            // TODO: implementasi update data berdasarkan $id
            $id_jenis = $this->input->post('id_jenis');
            $data = array(
                'nama_jenis' => $this->input->post('nama_jenis')
            );

            $this->JenisBarang_model->update($id_jenis, $data);
            redirect('jenisbarang');
        }
    
        public function destroy($id_jenis)
        {
            $this->JenisBarang_model->delete($id_jenis);
            redirect('jenisbarang');
        }
    }
    
    /* End of file JenisBarang.php */
    