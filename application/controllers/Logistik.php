<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

ob_start();

class Logistik extends CI_Controller {

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
            'page'          => 'logistik/index',
            'active'        => 'logistik',
            'menu'          => 'logistik/logistik',
            'breadcrumbs'   => 'Logistik',
            'akun'          => $this->akun(),
            'logistik'      => $this->m_app->logistik(),
            'jenis'         => $this->m_app->jenis(),
        ];

        $this->load->view('body', $data);
    }

    private function akun() {
        $id = $this->session->userdata['log']['id'];
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Barang Logistik
 
    public function addlogistik() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'logistik/index',
                'active'        => 'logistik',
                'menu'          => 'logistik/addlogistik',
                'breadcrumbs'   => 'Tambah Logistik',
                'akun'          => $this->akun(),
                'jenis'         => $this->m_app->jenis(),
                'kode'          => $this->m_app->kode('logistik', 'LG'),
            ];

            $this->load->view('body', $data);
        } else {
            $kode = $this->input->post('kode');
            $cek = $this->m_app->checkkode('logistik', $kode);

            if ($cek > 0) {
                $this->session->set_flashdata('error', 'Kode Logistik sudah digunakan');
            } else {
                $data = [
                    'kode'          => $kode,
                    'nm_logistik'   => $this->input->post('nm_logistik'),
                    'jenis_id'      => $this->input->post('jenis_id'),
                    'jml'           => $this->input->post('jml'),
                ];

                $this->db->insert('logistik', $data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');              
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatelogistik($id) {
        $kode = $this->input->post('kode');
        $cek = $this->m_app->checkkode('logistik', $kode, $id);

        if ($cek > 0) {
            $this->session->set_flashdata('error', 'Kode Logistik sudah digunakan');
        } else {
            $data = [
                'kode'          => $kode,
                'nm_logistik'   => $this->input->post('nm_logistik'),
                'jenis_id'      => $this->input->post('jenis_id'),
                'jml'           => $this->input->post('jml'),
            ];

            $this->m_app->ubah('logistik', $data, $id);
            $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Barang Masuk

    public function masuk() {
        if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bln = $_GET['bulan'];
            $th  = $_GET['tahun'];
        } else {
            $bln = date('m');
            $th  = date('Y');
        }

        $data = [
            'page'          => 'logistik/index',
            'active'        => 'masuk',
            'menu'          => 'logistik/masuk',
            'breadcrumbs'   => 'Barang Masuk',
            'akun'          => $this->akun(),
            'bln'           => $bln,
            'th'            => $th,
            'masuk'         => $this->m_app->masuk($bln, $th),
            'logistik'      => $this->m_app->logistik(),
        ];

        $this->load->view('body', $data);
    }

    public function addmasuk() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'logistik/index',
                'active'        => 'masuk',
                'menu'          => 'logistik/addmasuk',
                'breadcrumbs'   => 'Tambah Barang Masuk',
                'akun'          => $this->akun(),
                'logistik'      => $this->m_app->logistik(),
            ];

            $this->load->view('body', $data);
        } else {
            $jml            = $this->input->post('jml');
            $logistik_id    = $this->input->post('logistik_id');
            $log = $this->db->get_where('logistik', ['id' => $logistik_id])->row();

            $data = [
                'logistik_id'   => $logistik_id,
                'tgl'           => $this->input->post('tgl'),
                'jml'           => $jml,
                'ket'           => $this->input->post('ket'),
            ];

            $this->m_app->ubah('logistik', ['jml' => $jml + $log->jml], $logistik_id);            
            $this->db->insert('masuk', $data);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
            

            $data1['logistik'] =  $this->db->query("SELECT * FROM logistik where id='".$logistik_id."'");

            $data1['page']      = 'logistik/pesan';
            $data1['akun']      = $this->akun();
            $this->load->view('body',$data1);
           // redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatemasuk($id) {
        $logistik_id    = $this->input->post('logistik_id');
        $jml    = $this->input->post('jml');
        $masuk  = $this->db->get_where('masuk', ['id' => $id])->row();
        $lama    = $this->db->get_where('logistik', ['id' => $masuk->logistik_id])->row();
        $baru    = $this->db->get_where('logistik', ['id' => $logistik_id])->row();

        $data = [
            'logistik_id'   => $logistik_id,
            'tgl'           => $this->input->post('tgl'),
            'jml'           => $jml,
            'ket'           => $this->input->post('ket'),
        ];

        if ($masuk->logistik_id == $logistik_id) {
            if ($jml > $masuk->jml) {
                $sisa = $jml - $masuk->jml;
                $res  = $lama->jml + $sisa;
            } else {
                $sisa = $masuk->jml - $jml;
                $res  = $lama->jml - $sisa;
            }
            $this->m_app->ubah('logistik', ['jml' => $res], $lama->id);
        } else {
            $this->m_app->ubah('logistik', ['jml' => $jml + $baru->jml], $logistik_id);            
            $this->m_app->ubah('logistik', ['jml' => $lama->jml - $masuk->jml], $lama->id);            
        }

        $this->m_app->ubah('masuk', $data, $id);            
        $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Barang Keluar

    public function keluar() {
        if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bln = $_GET['bulan'];
            $th  = $_GET['tahun'];
        } else {
            $bln = date('m');
            $th  = date('Y');
        }

        $data = [
            'page'          => 'logistik/index',
            'active'        => 'keluar',
            'menu'          => 'logistik/keluar',
            'breadcrumbs'   => 'Barang Beluar',
            'akun'          => $this->akun(),
            'bln'           => $bln,
            'th'            => $th,
            'keluar'         => $this->m_app->keluar($bln, $th),
            'logistik'      => $this->m_app->logistik(),
        ];

        $this->load->view('body', $data);
    }

    public function addkeluar() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'logistik/index',
                'active'        => 'keluar',
                'menu'          => 'logistik/addkeluar',
                'breadcrumbs'   => 'Tambah Barang Keluar',
                'akun'          => $this->akun(),
                'logistik'      => $this->m_app->logistik(),
            ];

            $this->load->view('body', $data);
        } else {
            $jml            = $this->input->post('jml');
            $logistik_id    = $this->input->post('logistik_id');
            $log = $this->db->get_where('logistik', ['id' => $logistik_id])->row();

            $data = [
                'logistik_id'   => $logistik_id,
                'tgl'           => $this->input->post('tgl'),
                'jml'           => $jml,
                'ket'           => $this->input->post('ket'),
            ];

            if ($log->jml < $jml) {
                $this->session->set_flashdata('error', 'Jumlah stok tidak cukup');
            } else {
                $this->m_app->ubah('logistik', ['jml' => $log->jml - $jml], $logistik_id);            
                $this->db->insert('keluar', $data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatekeluar($id) {
        $logistik_id    = $this->input->post('logistik_id');
        $jml    = $this->input->post('jml');
        $keluar  = $this->db->get_where('keluar', ['id' => $id])->row();
        $lama    = $this->db->get_where('logistik', ['id' => $keluar->logistik_id])->row();
        $baru    = $this->db->get_where('logistik', ['id' => $logistik_id])->row();

        $data = [
            'logistik_id'   => $logistik_id,
            'tgl'           => $this->input->post('tgl'),
            'jml'           => $jml,
            'ket'           => $this->input->post('ket'),
        ];

        if ($keluar->logistik_id == $logistik_id) {
            if ($jml > $keluar->jml) {
                $sisa = $jml - $keluar->jml;
                $res  = $lama->jml - $sisa;
            } else {
                $sisa = $keluar->jml - $jml;
                $res  = $lama->jml + $sisa;
            }
            $this->m_app->ubah('logistik', ['jml' => $res], $lama->id);
        } else {
            $this->m_app->ubah('logistik', ['jml' => $baru->jml - $jml], $logistik_id);            
            $this->m_app->ubah('logistik', ['jml' => $lama->jml + $keluar->jml], $lama->id);            
        }

        $this->m_app->ubah('keluar', $data, $id);            
        $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Barang Rusak

    public function rusak() {
        if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bln = $_GET['bulan'];
            $th  = $_GET['tahun'];
        } else {
            $bln = date('m');
            $th  = date('Y');
        }

        $data = [
            'page'          => 'logistik/index',
            'active'        => 'rusak',
            'menu'          => 'logistik/rusak',
            'breadcrumbs'   => 'Barang Rusak',
            'akun'          => $this->akun(),
            'bln'           => $bln,
            'th'            => $th,
            'rusak'         => $this->m_app->rusak($bln, $th),
            'logistik'      => $this->m_app->logistik(),
        ];

        $this->load->view('body', $data);
    }

    //  public function ru() {
    //     if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
    //         $bln = $_GET['bulan'];
    //         $th  = $_GET['tahun'];
    //     } else {
    //         $bln = date('m');
    //         $th  = date('Y');
    //     }

    //     $data = [
    //         'page'          => 'logistik/ru',
    //         'active'        => 'rusak',
    //         'menu'          => 'logistik/rusak',
    //         'breadcrumbs'   => 'Barang Rusak',
    //         'akun'          => $this->akun(),
    //         'bln'           => $bln,
    //         'th'            => $th,
    //         'rusak'         => $this->m_app->rusak($bln, $th),
    //         'logistik'      => $this->m_app->logistik(),
    //     ];

    //     $this->load->view('body', $data);
    // }


    public function addrusak() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'logistik/index',
                'active'        => 'rusak',
                'menu'          => 'logistik/addrusak',
                'breadcrumbs'   => 'Tambah Barang Rusak',
                'akun'          => $this->akun(),
                'logistik'      => $this->m_app->logistik(),
            ];

            $this->load->view('body', $data);
        } else {
            $jml            = $this->input->post('jml');
            $logistik_id    = $this->input->post('logistik_id');
            $log = $this->db->get_where('logistik', ['id' => $logistik_id])->row();

            $data = [
                'logistik_id'   => $logistik_id,
                'tgl'           => $this->input->post('tgl'),
                'jml'           => $jml,
                'ket'           => $this->input->post('ket'),
            ];

            if ($log->jml < $jml) {
                $this->session->set_flashdata('error', 'Jumlah stok tidak cukup');
            } else {
                $this->m_app->ubah('logistik', ['jml' => $log->jml - $jml], $logistik_id);            
                $this->db->insert('rusak', $data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updaterusak($id) {
        $logistik_id    = $this->input->post('logistik_id');
        $jml    = $this->input->post('jml');
        $rusak  = $this->db->get_where('rusak', ['id' => $id])->row();
        $lama    = $this->db->get_where('logistik', ['id' => $rusak->logistik_id])->row();
        $baru    = $this->db->get_where('logistik', ['id' => $logistik_id])->row();

        $data = [
            'logistik_id'   => $logistik_id,
            'tgl'           => $this->input->post('tgl'),
            'jml'           => $jml,
            'ket'           => $this->input->post('ket'),
        ];

        if ($rusak->logistik_id == $logistik_id) {
            if ($jml > $rusak->jml) {
                $sisa = $jml - $rusak->jml;
                $res  = $lama->jml - $sisa;
            } else {
                $sisa = $rusak->jml - $jml;
                $res  = $lama->jml + $sisa;
            }
            $this->m_app->ubah('logistik', ['jml' => $res], $lama->id);
        } else {
            $this->m_app->ubah('logistik', ['jml' => $baru->jml - $jml], $logistik_id);            
            $this->m_app->ubah('logistik', ['jml' => $lama->jml + $rusak->jml], $lama->id);            
        }

        $this->m_app->ubah('rusak', $data, $id);            
        $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
        redirect($_SERVER['HTTP_REFERER']);
    } 

    public function deletedata($table, $id) {

        if ($table == 'logistik') {
            $masuk  = $this->db->get_where('masuk', ['logistik_id' => $id])->num_rows();
            $keluar = $this->db->get_where('keluar', ['logistik_id' => $id])->num_rows();
            $rusak  = $this->db->get_where('rusak', ['logistik_id' => $id])->num_rows();
            if ($masuk > 0) {
                $this->session->set_flashdata('warning', 'Logistik yang anda pilih masih tersedia pada data barang masuk');
            } else if($keluar > 0) {
                $this->session->set_flashdata('warning', 'Logistik yang anda pilih masih tersedia pada data barang keluar');
            } else if($rusak > 0) {
                $this->session->set_flashdata('warning', 'Logistik yang anda pilih masih tersedia pada data barang rusak');
            } else {
                $this->m_app->hapus($table, $id);
                $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
            }
        } else if($table == 'masuk') {
            $masuk  = $this->db->get_where('masuk', ['id' => $id])->row();
            $log    = $this->db->get_where('logistik', ['id' => $masuk->logistik_id])->row();

            $this->m_app->ubah('logistik', ['jml' => $log->jml - $masuk->jml], $log->id);            
            $this->m_app->hapus($table, $id);
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        } else if($table == 'keluar') {
            $keluar  = $this->db->get_where('keluar', ['id' => $id])->row();
            $log     = $this->db->get_where('logistik', ['id' => $keluar->logistik_id])->row();

            $this->m_app->ubah('logistik', ['jml' => $log->jml + $keluar->jml], $log->id);            
            $this->m_app->hapus($table, $id);
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        } else if($table == 'rusak') {
            $rusak  = $this->db->get_where('rusak', ['id' => $id])->row();
            $log     = $this->db->get_where('logistik', ['id' => $rusak->logistik_id])->row();

            $this->m_app->ubah('logistik', ['jml' => $log->jml + $rusak->jml], $log->id);            
            $this->m_app->hapus($table, $id);
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        } else {
            $this->m_app->hapus($table, $id);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}