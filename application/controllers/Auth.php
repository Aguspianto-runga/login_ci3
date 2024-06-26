<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }

    public function index()
    {

        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false)
        {
            $data ['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            //jika validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $user_role = $this->db->get_where('user_role', ['role' => $role])->row_array();

        // usernya ada
        if($user) {
            // jika user aktif
            if($user['is_active'] == 1) {
                //cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1) {
                        // redirect('admin');
                        redirect('user');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                <i class="icon fas fa-exclamation-triangle"></i> 
                                                                Wrong password!
                                                            </div>
                                                                ');
                                            redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <i class="icon fas fa-exclamation-triangle"></i> 
                                                        Email has not been activate!
                                                    </div>
                                                        ');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <i class="icon fas fa-exclamation-triangle"></i> 
                                                        Email is not registered!
                                                    </div>
                                                        ');
            redirect('auth');
        }
    }

    public function registration()
    {

        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already register!']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'password not macth', 'min_length' => 'password to short']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) 
        {
            $data ['title'] = 'Registration';
            $this->load->view('auth/registration', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <i class="icon fas fa-check"></i> 
                                                        Congratulation! Your account has been created
                                                    </div>
                                                        ');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <i class="icon fas fa-check"></i> 
                                                        You have been logout!
                                                    </div>
                                                        ');
                                            redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}
