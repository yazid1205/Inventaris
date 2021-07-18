<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

ob_start();

class Pengguna extends CI_Controller {

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
            'page'          => 'user/index',
            'active'        => 'pengguna',
            'menu'          => 'user/pengguna',
            'breadcrumbs'   => 'Pengguna',
            'akun'          => $this->akun(),
            'pengguna'      => $this->m_app->Pengguna(),
        ];

        $this->load->view('body', $data);
    }

    private function akun() {
        $id = $this->session->userdata['log']['id'];
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Barang Logistik

    public function addpengguna() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'user/index',
                'active'        => 'pengguna',
                'menu'          => 'user/addpengguna',
                'breadcrumbs'   => 'Tambah Pengguna',
                'akun'          => $this->akun(),
                'pengguna'      => $this->m_app->Pengguna(),
            ];

            $this->load->view('body', $data);
        } else {

        $name            = $this->input->post('name');
        $role            = $this->input->post('role');
        $username        = $this->input->post('username');
        $password        = $this->input->post('password');
        $level           = $this->input->post('level');
        $image           = $this->input->post('image');

        $data = [
                'name'           => $name,
                'role'           => $role,
                'username'       => $username,
                'password'       => $password,
                'level'          => $level,
                'image'          => $image,      
           ];

        $this->db->insert('users', $data);
        $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
        redirect('pengguna');
        }
    }

    public function updatepengguna($id) {
        $name            = $this->input->post('name');
        $role            = $this->input->post('role');
        $username        = $this->input->post('username');
        $password        = $this->input->post('password');
        $level           = $this->input->post('level');
        $image           = $this->input->post('image');

        $data = [
                'name'           => $name,
                'role'           => $role,
                'username'       => $username,
                'password'       => $password,
                'level'          => $level,
                'image'          => $image,      
           ];

            $this->m_app->ubah('users', $data, $id);
            $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
        
        
        redirect('pengguna');
    }

    public function deletedata($id) {
            $pengguna  = $this->db->get_where('users', ['id' => $id])->num_rows();
             if ($pengguna > 0) {
                $this->session->set_flashdata('warning', 'Data Pengguna yang anda pilih masih Ada');
                $this->m_app->hapuspengguna($id);
                $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
            } 

        redirect('pengguna');
    }
}