<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
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
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        if ($this->form_validation->run() == false){
            $this->load->view('template/header', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                                        <div class="toast-header">
                                                            <div class="me-auto fw-semibold">
                                                                <i class="fas fa-bell"></i>
                                                                Pemberitahuan
                                                            </div>
                                                                <small>1 mins ago</small>
                                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                                Data berhasil ditambah.
                                                            </div>
                                                            </div>');
                                                            redirect('menu');
        }

    }

    public function submenu()
    {
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        
        if ($this->form_validation->run() == false){
            $this->load->view('template/header', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else{
            $data = 
            [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                                            <div class="toast-header">
                                                                <div class="me-auto fw-semibold">
                                                                    <i class="fas fa-bell"></i>
                                                                    Pemberitahuan
                                                                </div>
                                                                    <small>1 mins ago</small>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                            </div>
                                                            <div class="toast-body">
                                                                    Data berhasil ditambah.
                                                                </div>
                                                        </div>');
                redirect('menu/submenu');
        }
    }

    public function edit_submenu($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['user_role'] = $this->db->get_where('user_role', ['role' => $this->session->userdata('role')])->row_array();        
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->result_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();

        $this->load->view('template/header', $data);
        $this->load->view('menu/edit_submenu', $data);
        $this->load->view('template/footer');
    }

    public function edit_submenu_aksi()
    {
        $id = $this->input->post('id');
        $menu_id = $this->input->post('menu_id');
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $data = array(
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon
        );

        $where = array(
            'id' => $id
        );

        $this->menu_model->update_data($where, $data, 'user_sub_menu');
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
        redirect('menu/submenu');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->menu_model->hapus_data($where, 'user_menu');
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
        redirect('menu');
    }

    public function delete_submenu($id)
    {
        $where = array('id' => $id);
        $this->menu_model->hapus_data($where, 'user_sub_menu');
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
        redirect('menu/submenu');
    }

}