<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

ob_start();

class App extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(['m_app']);
        date_default_timezone_set('Asia/Makassar');

        if ($this->session->userdata['log']['id'] == '') {
	    	redirect('auth');
	    }
    }

    public function index() {

        $data = [
            'page'          => 'home',
            'akun'          => $this->akun(),
        ];

        $this->load->view('body', $data);
    }

    public function buku() {

        $data = [
            'page'          => 'buku',
            'akun'          => $this->akun(),
            'buku'          => $this->m_app->buku(),
            'kategori'      => $this->m_app->kategori(),
        ];

        $this->load->view('body', $data);
    }

     public function kategori() {

        $data = [
            'page'          => 'kategori',
            'akun'          => $this->akun(),
            'kategori'      => $this->m_app->kategori(),
        ];

        $this->load->view('body', $data);
    }

    private function akun() {
        $id = $this->session->userdata['log']['id'];
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Buku

    public function addBuku() {
        $data = [
            'judul'         => $this->input->post('judul'),
            'pengarang'     => $this->input->post('pengarang'),
            'kategori_id'   => $this->input->post('kategori_id'),
        ];

        $this->db->insert('buku', $data);
        $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateBuku($id) {

        $data = [
            'judul'         => $this->input->post('judul'),
            'pengarang'     => $this->input->post('pengarang'),
            'kategori_id'   => $this->input->post('kategori_id'),
        ];

        $this->m_app->ubah('buku', $data, $id);
        $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Kategori

    public function addKategori() {
        $this->db->insert('kategori', ['nm_kategori' => $this->input->post('nm_kategori')]);
        $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateKategori($id) {
        $this->m_app->ubah('kategori', ['nm_kategori' => $this->input->post('nm_kategori')], $id);
        $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteData($table, $id) {
        $this->m_app->hapus($table, $id);

        $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        redirect($_SERVER['HTTP_REFERER']);
    }
}