<?php
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_rental');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('register');
    }

    public function simpan() {  
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username_admin]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'nama_admin'      => $this->input->post('nama'),
                'username_admin'  => $this->input->post('username'),
                'password_admin'  => md5($this->input->post('password')),
            );

            $this->M_rental->insert_data($data, 'admin');
            redirect('welcome?pesan=berhasil_daftar');
        }
    }
}
