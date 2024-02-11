<?php

class Matakuliah extends CI_Controller{

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
        $judul['title'] = 'Mata Kuliah';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['matakuliah'] = $this->matakuliah_model->tampil_data('matakuliah')->result();
        $data['jurusan'] = $this->matakuliah_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/matakuliah', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_matakuliah()
    {
        $judul['title'] = 'Tambah Mata Kuliah';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['jurusan'] = $this->matakuliah_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/matakuliah_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_matakuliah_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_matakuliah();
        }else{
            $kode_matakuliah = $this->input->post('kode_matakuliah');
            $nama_matakuliah = $this->input->post('nama_matakuliah');
            $sks = $this->input->post('sks');
            $semester = $this->input->post('semester');
            $nama_jurusan = $this->input->post('nama_jurusan');

            $data = array(
                'kode_matakuliah' => $kode_matakuliah,
                'nama_matakuliah' => $nama_matakuliah,
                'sks' => $sks,
                'semester' => $semester,
                'nama_jurusan' => $nama_jurusan
            );

            $this->matakuliah_model->insert_data($data, 'matakuliah');
            $this->session->set_flashdata('pesan', '<div class="alert alert-default-success alert-dismissible"
                                                    role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                        Data <strong>Mata kuliah</strong> berhasil ditambahkan!
                                                    </div>');
            redirect('administrator/matakuliah');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_matakuliah', 'kode_matakuliah', 'required', ['required' => 'Kode mata kuliah harus diisi!']);
        $this->form_validation->set_rules('nama_matakuliah', 'nama_matakuliah', 'required', ['required' => 'Nama mata kuliah harus diisi!']);
        $this->form_validation->set_rules('sks', 'sks', 'required', ['required' => 'SKS harus diisi!']);
        $this->form_validation->set_rules('semester', 'semester', 'required', ['required' => 'Semester harus diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Nama jurusan harus diisi!']);
    }

    public function detail($kode)
    {
        $judul['title'] = 'Tambah Mata Kuliah';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['detail'] = $this->matakuliah_model->ambil_kode_matakuliah($kode);
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/matakuliah_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update($id)
    {
        $judul['title'] = 'Ubah Mata Kuliah';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $where = array('kode_matakuliah' => $id);
        $data['matakuliah'] = $this->db->query("select * from matakuliah mk, jurusan jrs where mk.nama_jurusan = jrs.nama_jurusan and mk.kode_matakuliah = '$id'")->result();
        $data['jurusan'] = $this->matakuliah_model->tampil_data('jurusan')->result();

        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/matakuliah_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('kode_matakuliah');
        $kode_matakuliah = $this->input->post('kode_matakuliah');
        $nama_matakuliah = $this->input->post('nama_matakuliah');
        $sks = $this->input->post('sks');
        $semester = $this->input->post('semester');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = array(
            'kode_matakuliah' => $kode_matakuliah,
            'nama_matakuliah' => $nama_matakuliah,
            'sks' => $sks,
            'semester' => $semester,
            'nama_jurusan' => $nama_jurusan
        );
        
        $where = array(
            'kode_matakuliah' => $id
        );

        $this->matakuliah_model->update_data($where, $data, 'matakuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-default-success alert-dismissible"
                                                        role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                            Data <strong>Mata Kuliah</strong> berhasil diubah!
                                                        </div>');
        redirect('administrator/matakuliah');
    }

    public function delete($id)
    {
        $where = array('kode_matakuliah' => $id);
        $this->matakuliah_model->hapus_data($where, 'matakuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-default-danger alert-dismissible"
                                                        role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                            Data <strong>Mata Kuliah</strong> berhasil dihapus!
                                                        </div>');
        redirect('administrator/matakuliah');
    }

}