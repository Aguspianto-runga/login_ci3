<?php

class Jurusan extends CI_Controller{

    function __construct() {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"
                                            role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                                <h6><i class="icon fas fa-exclamation-triangle"></i> Anda belum login!</h6>
                                            </div>');
            redirect('administrator/auth');
        }
    }

    public function index()
    {
        $judul['title'] = 'Jurusan';
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function input()
    {
        $judul['title'] = 'Tambah Jurusan';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'id_jurusan' => set_value('id_jurusan'),
            'kode_jurusan' => set_value('kode_jurusan'),
            'nama_jurusan' => set_value('nama_jurusan'),
        );
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/jurusan_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->input();
        }else {
            $data = array(
                'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE)
            );

            $this->jurusan_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-default-success alert-dismissible"
                                                        role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                            Data <strong>Jurusan</strong> berhasil ditambahkan!
                                                        </div>');
            redirect('administrator/jurusan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_jurusan', 'kode_jurusan', 'required', ['required' => 'Kode jurusan harus diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Nama jurusan harus diisi!']);
    }

    public function update($id)
    {
        $judul['title'] = 'Ubah Jurusan';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $where = array('id_jurusan' => $id);
        $data['jurusan'] = $this->jurusan_model->edit_data($where, 'jurusan')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/jurusan_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_jurusan');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = array(
            'kode_jurusan' => $kode_jurusan,
            'nama_jurusan' => $nama_jurusan
        );
        
        $where = array(
            'id_jurusan' => $id
        );

        $this->jurusan_model->update_data($where, $data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-default-success alert-dismissible"
                                                        role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                            Data <strong>Jurusan</strong> berhasil diubah!
                                                        </div>');
        redirect('administrator/jurusan');
    }

    public function delete($id)
    {
        $where = array('id_jurusan' => $id);
        $this->jurusan_model->hapus_data($where, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-default-danger alert-dismissible"
                                                        role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                            Data <strong>Jurusan</strong> berhasil dihapus!
                                                        </div>');
        redirect('administrator/jurusan');
    }

}