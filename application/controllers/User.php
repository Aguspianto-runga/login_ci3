<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        /*if(!$this->session->userdata('email')) {
            redirect('auth');
        }*/
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        $data['jumlah_mahasiswa'] = $this->mahasiswa_model->getJumlahMahasiswa();
        $data['jumlah_jurusan'] = $this->jurusan_model->getJumlahJurusan();
        $data['jumlah_matkul'] = $this->matakuliah_model->getJumlahMatkul();
        // $data2['menu'] = $this->db->get_where('user_menu', ['menu' => $this->session->userdata('menu')])->row_array();        
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('user/home', $data);
        $this->load->view('template/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        

        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('user/user_edit', $data);
            $this->load->view('template/footer');
        } else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            
            $this->session->set_flashdata('pesan', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                                        <div class="toast-header">
                                                            <div class="me-auto fw-semibold">
                                                                <i class="fas fa-bell"></i>
                                                                Pemberitahuan
                                                            </div>
                                                                <small>1 mins ago</small>
                                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                                Data berhasil diubah.
                                                            </div>
                                                    </div>');
                                                redirect('user');
            }
    }

    public function mahasiswa()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        
        $this->load->view('template/header', $data);
        $this->load->view('user/mahasiswa', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['mahasiswa'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('user/mahasiswa_detail', $data);
        $this->load->view('template/footer');
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        

        $this->load->view('template/header', $data);
        $this->load->view('user/changepassword', $data);
        $this->load->view('template/footer');
    }



}

