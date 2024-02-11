<?php

class Tahun_akademik extends CI_Controller{

    /*public function index()
    {
        $judul['title'] = 'Tahun Akademik';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['tahun_akademik'] = $this->tahunakademik_model->tampil_data('tahun_akademik')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/tahun_akademik', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_tahun_akademik()
    {
        $judul['title'] = 'Tahun Akademik';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/tahun_akademik_form');
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_tahun_akademik_aksi()
    {
        //$this->_rules();
        if(!$this->form_validation->run() == FALSE)
        {
            $this->tambah_tahun_akademik_aksi();
        }else{
            $tahun_akademik = $this->input->post('tahun_akademik');
            $semester = $this->input->post('semester');
            $status = $this->input->post('status');

            $data = array(
                'tahun_akademik' => $tahun_akademik,
                'semester' => $semester,
                'status' => $status
            );

            $this->tahunakademik_model->insert_data($data, 'tahun_akademik');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"
                                                    role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                    <i class="icon fas fa-check"> Data <strong>Tahun Akademik</strong> berhasil ditambahkan!
                                                    </div>');
            redirect('administrator/tahun_akademik');
        }
    }



    public function update($id)
    {
        $judul['title'] = 'Tahun Akademik';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $where = array('id_thn_akad' => $id);
        $data['tahun_akademik'] = $this->tahunakademik_model->edit_data($where, 'tahun_akademik')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/tahun_akademik_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_thn_akad');
        $tahun_akademik = $this->input->post('tahun_akademik');
        $semester = $this->input->post('semester');
        $status = $this->input->post('status');

        $data = array(
            'tahun_akademik' => $tahun_akademik,
            'semester' => $semester,
            'status' => $status
        );

        $where = array(
            'id_thn_akad' => $id
        );
        $this->tahunakademik_model->update_data($where, $data, 'tahun_akademik');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"
                                                    role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                    <i class="icon fas fa-check"> Data <strong>Tahun Akademik</strong> berhasil diubah!
                                                    </div>');
            redirect('administrator/tahun_akademik');
    }

    public function delete($id)
    {
        $where = array('id_thn_akad' => $id);
        $this->tahunakademik_model->hapus_data($where, 'tahun_akademik');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"
                                                        role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <i class="icon fas fa-exclamation-triangle"> Data <strong>Tahun Akademik</strong> berhasil dihapus!
                                                        </div>');
        redirect('administrator/tahun_akademik');
    }*/

}