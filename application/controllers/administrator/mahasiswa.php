<?php
class Mahasiswa extends CI_Controller{

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
        $judul['title'] = 'Mahasiswa';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa2')->result();
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        //$count['total'] = $this->mahasiswa_model->countMahasiswa('mahasiswa2')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/mahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_mahasiswa()
    {
        $judul['title'] = 'Tambah Mahasiswa';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['jurusan'] = $this->mahasiswa_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/mahasiswa_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_mahasiswa_aksi()
    {
            $this->_rules();

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
                if ($foto = ''){}else{
                    $config['upload_path']          = './assets/img';
                    $config['allowed_types']        ='jpg|png|jpeg|gif';
                    
                    $this->load->library('upload', $config);
                    //$this->upload->initialize($config);
                    if(!$this->upload->do_upload('foto')){
                        echo "Foto harus diupload!"; die();
                    }else{
                        $foto=$this->upload->data('file_name');
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
    
                $this->mahasiswa_model->insert_data($data, 'mahasiswa2');
                
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
                redirect('administrator/mahasiswa');
            }
    }

    public function _rules()
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

    public function detail($id)
    {
        $judul['title'] = 'Detail Mahasiswa';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/mahasiswa_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update($id)
    {
        //$where = array('nim' => $nim);
        $where = array('id' => $id);
        $judul['title'] = 'Update Mahasiswa';
        $user = $this->user_model->ambil_data($this->session->userdata['username']);
        $data['mahasiswa'] = $this->db->query("select * from mahasiswa2 mhs, jurusan jrs where mhs.nama_jurusan=jrs.nama_jurusan and mhs.id='$id'")->result();
        //$data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa2')->result();
        $data['jurusan'] = $this->matakuliah_model->tampil_data('jurusan')->result();
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $this->load->view('templates_administrator/header', $judul);
        $this->load->view('templates_administrator/sidebar', $user);
        $this->load->view('administrator/mahasiswa_update', $data);
        $this->load->view('templates_administrator/footer');
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
        
                    $this->mahasiswa_model->update_data($where, $data, 'mahasiswa2');
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
                    redirect('administrator/mahasiswa');
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

            $this->mahasiswa_model->update_data($where, $data, 'mahasiswa2');
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
            redirect('administrator/mahasiswa');
            }
    }

    public function delete($id)
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
        redirect('administrator/mahasiswa');
    }



}