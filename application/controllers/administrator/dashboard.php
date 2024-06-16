<?php

class Dashboard extends CI_Controller{

    function __construct() {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"
                                            role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h6><i class="icon fas fa-exclamation-triangle"></i> Anda belum login!</h6>
                                            </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $judul['title'] = 'Dashboard';
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'foto' => $data->foto,
            'password' => $data->password,
            'level' => $data->level,
            'create_at' =>$data->create_at
        );
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('templates_administrator/footer');
    }

}
