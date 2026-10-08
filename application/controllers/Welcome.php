<?php
class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_rental');
        $this->load->helper(['cookie', 'url', 'form']);
        $this->load->library(['form_validation', 'session']);
    }

    public function index() {
        if ($this->input->cookie('remember_admin')) {
            $username = base64_decode($this->input->cookie('remember_admin'));

            // ambil data admin berdasarkan username
            $admin = $this->db->get_where('admin', ['username_admin' => $username])->row();
            if ($admin) {
                $session = array(
                    'id'     => $admin->admin_id,
                    'nama'   => $admin->admin_nama,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url('admin'));
            }
        }

        $this->load->view('login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember'); // checkbox remember me

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() != false) {
            $where = array(
                'username_admin' => $username,
                'password_admin' => md5($password)
            );

            $data = $this->M_rental->edit_data($where, 'admin');
            $d = $data->row();
            $cek = $data->num_rows();

            if ($cek > 0) {
                $session = array(
                    'id'     => $d->admin_id,
                    'nama'   => $d->admin_nama,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                if ($remember) {
                    set_cookie('remember_username', $username, 3600 * 24 * 7);
                    set_cookie('remember_password', $password, 3600 * 24 * 7);
                    set_cookie('remember_admin', base64_encode($username), 3600 * 24 * 7);
                } else {
                    delete_cookie('remember_username');
                    delete_cookie('remember_password');
                    delete_cookie('remember_admin');
                }
                redirect(base_url('admin'));
            } else {
                redirect(base_url('welcome?pesan=gagal'));
            }
        } else {
            $this->load->view('login');
        }
    }

    public function lupa_password() {
        $this->load->view('v_lupa_password');
    }

    public function proses_lupa() {
    }

    public function logout() {
        $this->session->sess_destroy();
        delete_cookie('remember_admin');
        redirect(base_url('welcome?pesan=logout'));
    }
}
