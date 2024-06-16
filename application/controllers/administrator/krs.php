<?php

class Krs extends CI_Controller{

    public function index()
    {
        $data = array(
            'nim' => set_value('nim'),
            'id_thn_akad' => set_value('id_thn_akad'),
        );
        $judul['title'] = 'KRS';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/masuk_krs', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function krs_aksi()
    {
        $this->_rulesKrs();

        if($this->form_validation->run()== FALSE){
            $this->index();
        }else{
            $nim = $this->input->post('nim', TRUE);
            $thn_akad = $this->input->post('id_thn_akad', TRUE);
        }

        if ($this->mahasiswa_model->get_by_id($nim) == null)
        {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"
                                            role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                                <i class="icon fas fa-exclamation-triangle m-auto"></i><strong> NIM</strong> Mahasiswa Belum Terdaftar!
                                            </div>');
            redirect('administrator/krs');
        }

        $data = array(
            'nim' => $nim,
            'id_thn_akad' => $thn_akad,
            'nama' => $this->mahasiswa_model->get_by_id($nim)->nama
        );

        $data2 = array(
            'krs_data' => $this->baca_krs($nim, $thn_akad),
            'nim' => $nim,
            'id_thn_akad' => $thn_akad,
            'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester,
            'nama' => $this->mahasiswa_model->get_by_id($nim)->nama,
            'jurusan' => $this->mahasiswa_model->get_by_id($nim)->nama_jurusan
        );

        $judul['title'] = 'KRS';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/krs_list', $data2);
        $this->load->view('templates_administrator/footer');
    }

    public function baca_krs($nim, $thn_akad)
    {
        $this->db->select('k.id_krs,k.kode_matakuliah, m.nama_matakuliah,m.sks');
        $this->db->from('krs as k');
        $this->db->where('k.nim', $nim);
        $this->db->where('k.id_thn_akad', $thn_akad);
        $this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');

        $krs = $this->db->get()->result();
        return $krs;
    }

    public function _rulesKrs()
    {
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('id_thn_akad', 'id_thn_akad', 'required');
    }

    public function tambah_krs($nim, $thn_akad)
    {
        $judul['title'] = 'KRS';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'id_krs' => set_value('id_krs'),
            'id_thn_akad' => $thn_akad,
            'thn_akad_smt' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester,
            'nim' => $nim,
            'kode_matakuliah' => set_value('kode_matakuliah')
        );
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/krs_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_krs_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_krs($this->input->post('nim', TRUE),
            $this->input->post('id_thn_akad',TRUE));
        }else{
            $nim = $this->input->post('nim', TRUE);
            $id_thn_akad = $this->input->post('id_thn_akad', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);

            $data = array(
                'id_thn_akad' => $id_thn_akad,
                'nim' => $nim,
                'kode_matakuliah' => $kode_matakuliah
            );
            $this->krs_model->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-default-success alert-dismissible"
                                            role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                                Data KRS berhasil ditambahkan!
                                            </div>');
            redirect('administrator/krs/krs_aksi');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_thn_akad', 'id_thn_akad', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required');
    }

}
