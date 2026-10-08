<?php
class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_rental');
        $this->load->library('form_validation');
    }

    public function lupa_password() {
        $this->load->view('lupa_password');
    }

    public function proses_lupa_password() {
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('lupa_password');
        } else {
            $username = $this->input->post('username');

            $admin = $this->M_rental->edit_data(['username_admin' => $username], 'admin')->row();

            if ($admin) {
                // Jika username ada, langsung tampilkan form reset password
                $data['admin'] = $admin;
                $this->load->view('reset_password', $data);
            } else {
                $data['error'] = "Username tidak ditemukan.";
                $this->load->view('lupa_password', $data);
            }
        }
    }

    public function reset_password() {
        $this->form_validation->set_rules('id_admin', 'ID Admin', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]');
        $this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'required|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan ulang form reset_password dengan data admin
            $id_admin = $this->input->post('id_admin');
            $data['admin'] = $this->M_rental->edit_data(['id_admin' => $id_admin], 'admin')->row();
            $this->load->view('reset_password', $data);
        } else {
            $id = $this->input->post('id_admin');
            $password_baru = md5($this->input->post('password_baru'));

            $this->db->where('id_admin', $id);
            $this->db->update('admin', ['password_admin' => $password_baru]);

            redirect('welcome?pesan=password_berhasil_diubah');
        }
    }
}
