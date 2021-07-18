<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

ob_start();

class Export extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(['m_app']);
        date_default_timezone_set('Asia/Makassar');

        if ($this->session->userdata['log']['id'] == '') {
	    	redirect('auth');
	    }
    }

    public function barang() {
    	$data = [
    		'page'		=> 'export/barang',
            'barang'    => $this->m_app->barang(),
            'title'		=> 'Data Barang'
    	];

        $this->load->view('export/body', $data);
    }

    public function hilang($bln, $th) {
        $bulan = $this->bulan($th . '-' .$bln);

        $data = [
            'page'          => 'export/hilang',
            'title'         => 'Data Barang Hilang Bulan '.$bulan.' ',
            'hilang'        => $this->m_app->hilang($bln, $th),
        ];

        $this->load->view('export/body', $data);
    }

    public function logistik() {
        $data = [
            'page'        => 'export/logistik',
            'logistik'    => $this->m_app->logistik(),
            'title'       => 'Data logistik'
        ];

        $this->load->view('export/body', $data);
    }

    private function bulan($date) {
        $BulanIndo = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $tahun  = substr($date, 0, 4);
        $bulan  = substr($date, 5, 2);
        $tgl    = substr($date, 8, 2);
        $result = $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }

    public function masuk($bln, $th) {
        $bulan = $this->bulan($th . '-' .$bln);

        $data = [
            'page'          => 'export/masuk',
            'title'         => 'Data Barang Masuk Bulan '.$bulan.' ',
            'masuk'         => $this->m_app->masuk($bln, $th),
        ];

        $this->load->view('export/body', $data);
    }

    public function keluar($bln, $th) {
        $bulan = $this->bulan($th . '-' .$bln);

        $data = [
            'page'          => 'export/keluar',
            'title'         => 'Data Barang Keluar Bulan '.$bulan.' ',
            'keluar'         => $this->m_app->keluar($bln, $th),
        ];

        $this->load->view('export/body', $data);
    }

    public function rusak($bln, $th) {
        $bulan = $this->bulan($th . '-' .$bln);

        $data = [
            'page'          => 'export/rusak',
            'title'         => 'Data Barang Rusak Bulan '.$bulan.' ',
            'rusak'         => $this->m_app->rusak($bln, $th),
        ];

        $this->load->view('export/body', $data);
    }
}