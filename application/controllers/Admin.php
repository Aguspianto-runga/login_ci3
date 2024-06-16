<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['jumlah_mahasiswa'] = $this->mahasiswa_model->getJumlahMahasiswa();
        $data['jumlah_jurusan'] = $this->jurusan_model->getJumlahJurusan();
        $data['jumlah_matkul'] = $this->matakuliah_model->getJumlahMatkul();
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
    
    public function mahasiswa()
    {
        $data['title'] = 'Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        $data['jumlah_mahasiswa'] = $this->mahasiswa_model->getJumlahMahasiswa();
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/mahasiswa', $data);
        $this->load->view('template/footer');
    }

    public function matakuliah()
    {
        $data['title'] = 'Matakuliah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        $data['matakuliah'] = $this->matakuliah_model->tampil_data('matakuliah')->result();
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/matakuliah', $data);
        $this->load->view('template/footer');
    }

    public function input_mahasiswa()
    {
        $data['title'] = 'Tambah Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/mahasiswa_input', $data);
        $this->load->view('template/footer');
    }

    public function tambah_mahasiswa_aksi()
    {
            $this->_rulesMahasiswa();

            if($this->form_validation->run() == FALSE){
                $this->tambah_mahasiswa();
            }else{
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $email = $this->input->post('email');
                $telpon = $this->input->post('telpon');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $nama_jurusan = $this->input->post('nama_jurusan');
                $foto = $_FILES['foto']['name'];
                if ($foto != '') { // Pastikan ada file yang diunggah
                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                                
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('foto')) {
                        echo "Foto harus diupload!"; die();
                    } else {
                        $foto = $this->upload->data('file_name');
                    }
                    
                }
    
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'email' => $email,
                    'telpon' => $telpon,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nama_jurusan' => $nama_jurusan,
                    'foto' => $foto
                );
    
                $this->mahasiswa_model->insert_data($data, 'mahasiswa');
                
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
                                                                    Data berhasil ditambahkan.
                                                                </div>
                                                        </div>');
                redirect('admin/mahasiswa');
            }
    }

    public function _rulesMahasiswa()
    {
        $this->form_validation->set_rules('nim', 'nim', 'required', ['required' => 'NIM harus diisi!']);
        $this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Alamat harus diisi!']);
        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email harus diisi!']);
        $this->form_validation->set_rules('telpon', 'telpon', 'required', ['required' => 'Telpon harus diisi!']);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required', ['required' => 'Tempat lahir harus diisi!']);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', ['required' => 'Tanggal lahir harus diisi!']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', ['required' => 'Jenis kelamin harus diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Jurusan harus diisi!']);
        if(empty($_FILES['foto']['name'])){
            $this->form_validation->set_rules('foto', 'foto', 'required', ['required' => 'Foto harus diisi!']);
        }
    } 

    public function detail_mahasiswa($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['mahasiswa'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);

        $this->load->view('template/header', $data);
        $this->load->view('admin/mahasiswa_detail', $data);
        $this->load->view('template/footer');
    }

    public function delete_mahasiswa($id)
    {
        $where = array('id' => $id);
        $this->mahasiswa_model->hapus_data($where, 'mahasiswa');
        $this->session->set_flashdata('pesan', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                                    <div class="toast-header">
                                                        <div class="me-auto fw-semibold">
                                                            <i class="fas fa-bell"></i>
                                                            Pemberitahuan
                                                        </div>
                                                            <small>1 mins ago</small>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="toast-body">
                                                            Data berhasil dihapus.
                                                        </div>
                                                </div>');
        redirect('admin/mahasiswa');
    }

    public function update_mahasiswa($id)
    {
        
        //$where = array('nim' => $nim);
        $where = array('id' => $id);
        $data['title'] = 'Update Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, jurusan jrs where mhs.nama_jurusan=jrs.nama_jurusan and mhs.id='$id'")->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);

        $this->load->view('template/header', $data);
        $this->load->view('admin/mahasiswa_update', $data);
        $this->load->view('template/footer');
    }

    public function update_mahasiswa_aksi()
    {
            $id = $this->input->post('id');
            $config['upload_path']          = 'assets/img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('foto'))
            {
                $id = $this->input->post('id');
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $email = $this->input->post('email');
                $telpon = $this->input->post('telpon');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $nama_jurusan = $this->input->post('nama_jurusan');
                $foto = $_FILES['foto']['name'];//agar foto lama tdk terhapus
                
                
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'email' => $email,
                    'telpon' => $telpon,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nama_jurusan' => $nama_jurusan,
                    );
                    
                    $where = array(
                        'id' => $id
                    );
        
                    $this->mahasiswa_model->update_data($where, $data, 'mahasiswa');
                    /*$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"
                                                                role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                    <i class="icon fas fa-check m-auto"></i> Data <strong>Mahasiswa</strong> berhasil diubah!
                                                            </div>');*/
                    $this->session->set_flashdata('pesan', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-info top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
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
                    redirect('admin/mahasiswa');
            }
            else
            {
                //$nim = $this->input->post('nim');
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $nim = $this->input->post('nim');
                $nama = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $email = $this->input->post('email');
                $telpon = $this->input->post('telpon');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $nama_jurusan = $this->input->post('nama_jurusan');
                
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'email' => $email,
                    'telpon' => $telpon,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nama_jurusan' => $nama_jurusan,
                    'foto' => $foto
                );
                
                $where = array(
                    'id' => $id
                );

            $this->mahasiswa_model->update_data($where, $data, 'mahasiswa');
            $this->session->set_flashdata('pesan', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-info top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
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
            redirect('admin/mahasiswa');
            }
    }

    public function jurusan()
    {
        $data['title'] = 'Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/jurusan', $data);
        $this->load->view('template/footer');
    }

    public function jurusan_input_aksi()
    {

        $this->_rulesJurusan();
        
        if ($this->form_validation->run() == FALSE) {
            $this->jurusan();
        }else {
            $data = array(
                'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE)
            );
            
            $this->jurusan_model->input_data($data);
            // $this->db->insert('jurusan', [
                //     'kode_jurusan' => $this->input->post('kode_jurusan'),
                //     'nama_jurusan' => $this->input->post('nama_jurusan'),
                // ]);
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
                                                        Data berhasil ditambahkan.
                                                        </div>
                                                    </div>');
            redirect('admin/jurusan');
        }
    }
    
    public function _rulesJurusan()
    {
        $this->form_validation->set_rules('kode_jurusan', 'kode_jurusan', 'required', ['required' => 'Kode jurusan harus diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Nama jurusan harus diisi!']);
    }

    public function update_jurusan($id_jurusan)
    {
        $data['title'] = 'Update Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();
        $data['jurusan'] = $this->jurusan_model->ambil_id_jurusan($id_jurusan);
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/jurusan_update', $data);
        $this->load->view('template/footer');
    }

    public function jurusan_update_aksi()
    {
        $id_jurusan = $this->input->post('id_jurusan');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = array(
            'kode_jurusan' => $kode_jurusan,
            'nama_jurusan' => $nama_jurusan
        );
        
        $where = array(
            'id_jurusan' => $id_jurusan
        );

        // Debugging
        $result = $this->jurusan_model->update_data($where, $data, 'jurusan');
        log_message('debug', 'Update result: ' . $result);

        $this->session->set_flashdata('pesan', '<div class="alert alert-default-success alert-dismissible"
                                                    role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                        Data <strong>Jurusan</strong> berhasil diubah!
                                                    </div>');
        redirect('admin/jurusan');
    }

    public function delete_jurusan($id_jurusan)
    {
        $where = array('id_jurusan' => $id_jurusan);
        $this->jurusan_model->hapus_data($where, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                                    <div class="toast-header">
                                                        <div class="me-auto fw-semibold">
                                                            <i class="fas fa-bell"></i>
                                                            Pemberitahuan
                                                        </div>
                                                            <small>1 mins ago</small>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="toast-body">
                                                            Data berhasil dihapus.
                                                        </div>
                                                </div>');
        redirect('admin/jurusan');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer');
    }
    
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('template/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else{
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-info top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                                    <div class="toast-header">
                                                        <div class="me-auto fw-semibold">
                                                            <i class="fas fa-bell"></i>
                                                            Pemberitahuan
                                                        </div>
                                                            <small>1 mins ago</small>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="toast-body">
                                                            Akses berhasil diubah.
                                                        </div>
                                                </div>');
    }

    public function tambah_matakuliah_aksi()
    {
        if($this->form_validation->run() == FALSE)
        {
            $this->matakuliah();
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
            $this->session->set_flashdata('message', '<div class="alert alert-default-success alert-dismissible"
                                                    role=""alert><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                        Data <strong>Mata kuliah</strong> berhasil ditambahkan!
                                                    </div>');
            redirect('admin/matakuliah');
        }
    }

}
