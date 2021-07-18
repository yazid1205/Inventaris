<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

ob_start();

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(['m_app']);
    }

    public function index() {
        $this->load->view('login');
    }

    public function register() {
    	$var['page'] = 'auth/register';

        $this->load->view('auth/body', $var);
    }

    public function ceklogin() {
    	$username 	= $this->input->post('username');
    	$password 	= $this->input->post('password');


    	// Proses cek username
    	$cek = $this->m_app->cek_username($username);
        if($cek->num_rows() > 0) {
            $d = $cek->row();

            // Proses cek password
            if(password_verify($password, $d->password)) {
                $var['id'] = $d->id;

                $this->session->set_userdata('log', $var);
                $this->session->set_flashdata('success-login', 'Login Berhasil');
                redirect('app');
            } else {
                $this->session->set_flashdata('warning', 'Password anda salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('danger', 'Akun tidak terdaftar');
            redirect('auth');
        }
    }
    
    function logout() {
    	$this->session->sess_destroy();
    	redirect('auth');
    }
}