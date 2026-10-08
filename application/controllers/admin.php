<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        if($this->session->userdata('status') != "login"){
            redirect(base_url('welcome?pesan=belumlogin'));
        }
    }

    function index(){
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 10")->result();
        $data['kostumer']  = $this->db->query("SELECT * FROM kostumer ORDER BY id_kostumer DESC LIMIT 10")->result();
        $data['mobil']     = $this->db->query("SELECT * FROM mobil ORDER BY id_mobil DESC LIMIT 10")->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/main', $data);
        $this->load->view('admin/footer');
    }

    function mobil(){
        $data['mobil'] = $this->M_rental->get_data('mobil')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/mobil', $data);
        $this->load->view('admin/footer');
    }

    function mobil_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/mobil_add');
        $this->load->view('admin/footer');
    }

    function mobil_edit($id)
    {
    $where = array('id_mobil' => $id);
    $data['mobil'] = $this->M_rental->edit_data($where, 'mobil')->row();

    // Load tampilan form edit dan kirim data ke view
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/navbar');
    $this->load->view('admin/mobil_edit', $data); // <-- penting: kirim $data ke view
    $this->load->view('admin/footer');
    }

    function mobil_hapus($id){
        $where = array(
            'id_mobil' => $id
        );
        $this->M_rental->delete_data($where,'mobil');
        redirect(base_url().'admin/mobil');
    }

    function mobil_add_act() {
    $merk   = $this->input->post('merk');
    $plat   = $this->input->post('plat');
    $warna  = $this->input->post('warna');
    $tahun  = $this->input->post('tahun');
    $status = $this->input->post('status');

    $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
    $this->form_validation->set_rules('status', 'Status Mobil', 'required');

    if ($this->form_validation->run() != false) {
        $data = array(
            'mobil_merk'   => $merk,
            'mobil_plat'   => $plat,
            'mobil_warna'  => $warna,
            'mobil_tahun'  => $tahun,
            'mobil_status' => $status
        );

        $this->M_rental->insert_data($data, 'mobil');
        redirect(base_url() . 'admin/mobil');
    } else {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/mobil_add');
        $this->load->view('admin/footer');
    }
}

function mobil_update()
{
    $id     = $this->input->post('id');
    $merk   = $this->input->post('merk');
    $plat   = $this->input->post('plat');
    $warna  = $this->input->post('warna');
    $tahun  = $this->input->post('tahun');
    $status = $this->input->post('status');

    // Validasi form
    $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
    $this->form_validation->set_rules('plat', 'No. Plat', 'required');
    $this->form_validation->set_rules('warna', 'Warna', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
    $this->form_validation->set_rules('status', 'Status Mobil', 'required');

    if ($this->form_validation->run() != false) {
        $where = array('id_mobil' => $id);

        $data = array(
            'mobil_merk'   => $merk,
            'mobil_plat'   => $plat,
            'mobil_warna'  => $warna,
            'mobil_tahun'  => $tahun,
            'mobil_status' => $status
        );

        $this->M_rental->update_data($where, $data, 'mobil');
        redirect(base_url('admin/mobil'));
    } else {
        $where = array('id_mobil' => $id);
        $data['mobil'] = $this->M_rental->edit_data($where, 'mobil')->row();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');
        $this->load->view('admin/mobil_edit', $data);
        $this->load->view('admin/footer');
    }
}


function kostumer(){
    $data['kostumer'] = $this->M_rental->get_data('kostumer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/kostumer', $data);
        $this->load->view('admin/footer');
}

    function kostumer_add(){
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/kostumer_add');
        $this->load->view('admin/footer');
    }

    function kostumer_add_act() {
    $nama   = $this->input->post('nama');
    $alamat   = $this->input->post('alamat');
    $hp  = $this->input->post('hp');
    $ktp = $this->input->post('ktp');
    $jk  = $this->input->post('jk');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('hp', 'No. HP', 'required');
    $this->form_validation->set_rules('ktp', 'No. KTP', 'required');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');


    if ($this->form_validation->run() != false) {
        $data = array(
            'kostumer_nama'   => $nama,
            'kostumer_alamat'   => $alamat,
            'kostumer_hp'  => $hp,
            'kostumer_ktp' => $ktp,
            'kostumer_jk'  => $jk
        );

        $this->M_rental->insert_data($data, 'kostumer');
        redirect(base_url() . 'admin/kostumer');
    } else {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/kostumer_add');
        $this->load->view('admin/footer');
    }
}

    function kostumer_edit($id)
    {
    $where = array('id_kostumer' => $id);
    $data['kostumer'] = $this->M_rental->edit_data($where, 'kostumer')->row();

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/navbar');
    $this->load->view('admin/kostumer_edit', $data);
    $this->load->view('admin/footer');
    }

    function kostumer_update()
{
    $id     = $this->input->post('id');
    $nama   = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $hp     = $this->input->post('hp');
    $ktp    = $this->input->post('ktp');
    $jk     = $this->input->post('jk');

    // Validasi form
    $this->form_validation->set_rules('nama', 'Nama Kostumer', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('hp', 'No. HP', 'required');
    $this->form_validation->set_rules('ktp', 'No. KTP', 'required');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

    if ($this->form_validation->run() != false) {
        $where = array('id_kostumer' => $id);

        $data = array(
            'kostumer_nama'   => $nama,
            'kostumer_alamat' => $alamat,
            'kostumer_hp'     => $hp,
            'kostumer_ktp'    => $ktp,
            'kostumer_jk'     => $jk
        );

        $this->M_rental->update_data($where, $data, 'kostumer');
        redirect(base_url('admin/kostumer'));
    } else {
        // Jika validasi gagal, muat ulang form edit dengan data lama
        $where = array('id_kostumer' => $id);
        $data['kostumer'] = $this->M_rental->edit_data($where, 'kostumer')->row();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');
        $this->load->view('admin/kostumer_edit', $data);
        $this->load->view('admin/footer');
    }
}

    function kostumer_hapus($id){
        $where = array(
            'id_kostumer' => $id
        );
        $this->M_rental->delete_data($where,'kostumer');
        redirect(base_url().'admin/kostumer');
    }

    function transaksi(){
        $data['transaksi'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/transaksi', $data);
        $this->load->view('admin/footer');
    }

        function transaksi_add(){
        $w = array('mobil_status'=>'1');
        $data['mobil'] = $this->M_rental->edit_data($w,'mobil')->result();
        $data['kostumer'] = $this->M_rental->get_data('kostumer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');   
        $this->load->view('admin/transaksi_add',$data);
        $this->load->view('admin/footer');
    }

    public function transaksi_add_aksi()
{
    // Ambil input dari form sesuai dengan name input aslinya
    $kostumer   = $this->input->post('kostumer');
    $mobil      = $this->input->post('id_mobil'); // karena form pakai name="id_mobil"
    $tgl_pinjam = $this->input->post('transaksi_tgl_pinjam');
    $tgl_kembali= $this->input->post('transaksi_tgl_kembali');
    $harga      = $this->input->post('transaksi_harga');
    $denda      = $this->input->post('transaksi_denda');

    // Validasi input
    $this->form_validation->set_rules('kostumer', 'Kostumer', 'required');
    $this->form_validation->set_rules('id_mobil', 'Mobil', 'required');
    $this->form_validation->set_rules('transaksi_tgl_pinjam', 'Tanggal Pinjam', 'required');
    $this->form_validation->set_rules('transaksi_tgl_kembali', 'Tanggal Kembali', 'required');
    $this->form_validation->set_rules('transaksi_harga', 'Harga', 'required');
    $this->form_validation->set_rules('transaksi_denda', 'Denda', 'required');

    if ($this->form_validation->run() != false) {
        $data = array(
            'transaksi_kostumer'        => $kostumer,
            'transaksi_mobil'           => $mobil,
            'transaksi_tgl_pinjam'      => $tgl_pinjam,
            'transaksi_tgl_kembali'     => $tgl_kembali,
            'transaksi_harga'           => $harga,
            'transaksi_denda'           => $denda,
            'transaksi_tgl'             => date('Y-m-d'),
            'transaksi_totaldenda'      => 0,
            'transaksi_tgldikembalikan' => '0000-00-00',
            'transaksi_status'          => 0
        );

        // Masukkan ke tabel transaksi
        $this->M_rental->insert_data($data, 'transaksi');

        // Update status mobil
        $status_mobil = array('mobil_status' => '2');
        $where_mobil = array('id_mobil' => $mobil);
        $this->M_rental->update_data($where_mobil, $status_mobil, 'mobil');

        redirect(base_url('admin/transaksi'));
    } 
    else {
        // Jika validasi gagal
        $w = array('mobil_status' => '1');
        $data['mobil'] = $this->M_rental->edit_data($w, 'mobil')->result();
        $data['kostumer'] = $this->M_rental->get_data('kostumer')->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');
        $this->load->view('admin/transaksi_add', $data);
        $this->load->view('admin/footer');
    }
}

public function transaksi_hapus($id)
{
    // Ambil data transaksi berdasarkan ID
    $where = array('id_transaksi' => $id);
    $data  = $this->M_rental->edit_data($where, 'transaksi')->row();

    // Ambil ID mobil dari transaksi
    $id_mobil = $data->transaksi_mobil;

    // Kembalikan status mobil menjadi tersedia (1)
    $status_mobil = array('mobil_status' => '1');
    $where_mobil  = array('id_mobil' => $id_mobil);
    $this->M_rental->update_data($where_mobil, $status_mobil, 'mobil');

    // Hapus data transaksi
    $this->M_rental->delete_data($where, 'transaksi');

    // Redirect kembali ke halaman transaksi
    redirect(base_url('admin/transaksi'));
}

public function transaksi_selesai($id)
{
    $data['mobil'] = $this->M_rental->get_data('mobil')->result();
    $data['kostumer'] = $this->M_rental->get_data('kostumer')->result();
    $data['transaksi'] = $this->db->query("select * FROM transaksi,mobil,kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and id_transaksi='$id'")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('admin/footer');
}

public function transaksi_selesai_aksi($id)
{
    // Ambil input dari form
    $tgl_dikembalikan = $this->input->post('transaksi_tgldikembalikan');
    $tgl_kembali      = $this->input->post('transaksi_tgl_kembali');
    $denda_per_hari   = $this->input->post('transaksi_denda');
    $mobil_id         = $this->input->post('transaksi_mobil');

    // Hitung selisih hari keterlambatan
    $tgl1 = new DateTime($tgl_kembali);
    $tgl2 = new DateTime($tgl_dikembalikan);
    $selisih = $tgl2->diff($tgl1)->days;

    // Hitung total denda jika dikembalikan lewat tanggal
    $total_denda = 0;
    if ($tgl2 > $tgl1) {
        $total_denda = $selisih * $denda_per_hari;
    }

    // Update transaksi
    $data = array(
        'transaksi_status'          => 1, // selesai
        'transaksi_tgldikembalikan' => $tgl_dikembalikan,
        'transaksi_totaldenda'      => $total_denda
    );

    $where = array('id_transaksi' => $id);
    $this->M_rental->update_data($where, $data, 'transaksi');

    // Update status mobil jadi tersedia lagi
    $this->M_rental->update_data(['id_mobil' => $mobil_id], ['mobil_status' => '1'], 'mobil');

    // Redirect kembali
    redirect(base_url('admin/transaksi'));
}

function laporan(){
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $this->form_validation->set_rules('dari','Dari Tanggal','required');
    $this->form_validation->set_rules('sampai','Sampai Tanggal','required');

    if($this->form_validation->run() !=false){
        $data['laporan'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and date(transaksi_tgl) >= '$dari'")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');
        $this->load->view('admin/laporan_filter', $data);
        $this->load->view('admin/footer');
    }else{
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/navbar');
        $this->load->view('admin/laporan');
        $this->load->view('admin/footer');
    }
}

function laporan_print(){
    $dari = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    if($dari != ""&& $sampai != ""){
        $data['laporan'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=id_mobil and transaksi_kostumer=id_kostumer and date(transaksi_tgl) >= '$dari'")->result();
        $this->load->view('admin/laporan_print',$data);    
        }else{
        redirect("admin/laporan");
    }
}

}
