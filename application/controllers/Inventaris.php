<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

ob_start();

class Inventaris extends CI_Controller {

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
            'page'          => 'inventaris/index',
            'active'        => 'barang',
            'menu'          => 'inventaris/barang',
            'breadcrumbs'   => 'Barang',
            'akun'          => $this->akun(),
            'jenis'         => $this->m_app->jenis(),
            'ruangan'       => $this->m_app->ruangan(),
            'barang'        => $this->m_app->barang(),
            'kode'          => $this->m_app->kode('barang', 'BG'),
        ];

        $this->load->view('body', $data);
    }

    private function akun() {
        $id = $this->session->userdata['log']['id'];
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // Barang

    public function addbarang() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'inventaris/index',
                'active'        => 'barang',
                'menu'          => 'inventaris/addbarang',
                'breadcrumbs'   => 'Tambah Barang',
                'akun'          => $this->akun(),
                'jenis'         => $this->m_app->jenis(),
                'ruangan'       => $this->m_app->ruangan(),
                'barang'        => $this->m_app->barang(),
                'kode'          => $this->m_app->kode('barang', 'BG'),
            ];

            $this->load->view('body', $data);
        } else {
            $kode = $this->input->post('kode');
            $cek = $this->m_app->checkkode('barang', $kode);

            if ($cek > 0) {
                $this->session->set_flashdata('error', 'Kode barang sudah digunakan');
            } else {
                $data = [
                    'kode'          => $kode,
                    'nm_barang'     => $this->input->post('nm_barang'),
                    'jenis_id'      => $this->input->post('jenis_id'),
                    'ruangan_id'    => $this->input->post('ruangan_id'),
                    'jml'           => $this->input->post('jml'),
                    'ket'           => $this->input->post('ket'),
                ];

                $this->db->insert('barang', $data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
            }
            

        $this->load->view('inventaris/pesan');
          //redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function editbarang() {
        $id     = $this->input->post('id');
        $kode   = $this->input->post('kode');
        $cek    = $this->m_app->checkkode('barang', $kode, $id);

        if ($cek > 0) {
            $this->session->set_flashdata('error', 'Kode barang sudah digunakan');
        } else {
            $data = [
                'kode'          => $kode,
                'nm_barang'     => $this->input->post('nm_barang'),
                'jenis_id'      => $this->input->post('jenis_id'),
                'ruangan_id'    => $this->input->post('ruangan_id'),
                'jml'           => $this->input->post('jml'),
                'ket'           => $this->input->post('ket'),
            ];

            $this->m_app->ubah('barang', $data, $id);
            $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function modalbarang() {
        $id = $this->input->post('id');
        $jenis         = $this->m_app->jenis();
        $ruangan       = $this->m_app->ruangan();
        $d = $this->m_app->barang($id)->row();

        echo '
        <input type="hidden" name="id" value="'.$id.'">
            <div class="form-group pb-2">
                <label>Kode</label>
                <input type="text" class="form-control form-control-sm" name="kode" value="'.$d->kode.'" readonly/>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group pb-2">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control form-control-sm" name="nm_barang" value="'.$d->nm_barang.'">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control form-control-sm" name="jml" value="'.$d->jml.'">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group pb-2">
                        <label>Jenis</label>
                        <select name="jenis_id" class="form-control form-control-sm" required="">
                            <option value="">Silahkan Pilih</option>';
                            foreach ($jenis->result() as $e) {
                                if($e->id == $d->jenis_id) {
                                    $check = 'selected';
                                } else {
                                    $check = '';
                                }
                                echo '<option value="'.$e->id.'" '.$check.'>'.$e->nm_jenis.'</option>';
                            }
                    echo '
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select name="ruangan_id" class="form-control form-control-sm" required="">
                            <option value="">Silahkan Pilih</option>';
                            foreach ($ruangan->result() as $e) {
                                if($e->id == $d->ruangan_id) {
                                    $check = 'selected';
                                } else {
                                    $check = '';
                                }
                                echo '<option value="'.$e->id.'" '.$check.'>'.$e->nm_ruangan.'</option>';
                            }
                    echo '
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control" cols="30" rows="4">'.$d->ket.'</textarea>
                    </div>
                </div>
            </div>
        ';
    }

    // Jenis

    public function jenis() {

        $data = [
            'page'          => 'inventaris/index',
            'active'        => 'jenis',
            'menu'          => 'inventaris/jenis',
            'breadcrumbs'   => 'Jenis',
            'akun'          => $this->akun(),
            'jenis'         => $this->m_app->jenis(),
        ];

        $this->load->view('body', $data);
    }

    public function addjenis() {
        $this->db->insert('jenis', ['nm_jenis' => $this->input->post('nm_jenis')]);
        $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updatejenis($id) {
        $this->m_app->ubah('jenis', ['nm_jenis' => $this->input->post('nm_jenis')], $id);
        $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Ruangan

    public function ruangan() {

        $data = [
            'page'          => 'inventaris/index',
            'active'        => 'ruangan',
            'menu'          => 'inventaris/ruangan',
            'breadcrumbs'   => 'Ruangan',
            'akun'          => $this->akun(),
            'ruangan'       => $this->m_app->ruangan(),
        ];

        $this->load->view('body', $data);
    }

    public function addruangan() {
        $this->db->insert('ruangan', ['nm_ruangan' => $this->input->post('nm_ruangan')]);
        $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateruangan($id) {
        $this->m_app->ubah('ruangan', ['nm_ruangan' => $this->input->post('nm_ruangan')], $id);
        $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Barang Hilang

    public function hilang() {
        if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bln = $_GET['bulan'];
            $th  = $_GET['tahun'];
        } else {
            $bln = date('m');
            $th  = date('Y');
        }

        $data = [
            'page'          => 'inventaris/index',
            'active'        => 'hilang',
            'menu'          => 'inventaris/hilang',
            'breadcrumbs'   => 'Barang Hilang',
            'akun'          => $this->akun(),
            'bln'           => $bln,
            'th'            => $th,
            'hilang'        => $this->m_app->hilang($bln, $th),
            'barang'        => $this->m_app->barang(),
        ];

        $this->load->view('body', $data);
    }

    public function addhilang() {
        if (!$this->input->post()) {
            $data = [
                'page'          => 'inventaris/index',
                'active'        => 'hilang',
                'menu'          => 'inventaris/addhilang',
                'breadcrumbs'   => 'Tambah Barang hilang',
                'akun'          => $this->akun(),
                'barang'        => $this->m_app->barang(),
            ];

            $this->load->view('body', $data);
        } else {
            $jml            = $this->input->post('jml');
            $barang_id      = $this->input->post('barang_id');
            $log = $this->db->get_where('barang', ['id' => $barang_id])->row();

            $data = [
                'barang_id'     => $barang_id,
                'tgl'           => $this->input->post('tgl'),
                'jml'           => $jml,
                'ket'           => $this->input->post('ket'),
            ];

            if ($log->jml < $jml) {
                $this->session->set_flashdata('error', 'Jumlah stok tidak cukup');
            } else {
                $this->m_app->ubah('barang', ['jml' => $log->jml - $jml], $barang_id);            
                $this->db->insert('hilang', $data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatehilang($id) {
        $barang_id      = $this->input->post('barang_id');
        $jml            = $this->input->post('jml');
        $hilang         = $this->db->get_where('hilang', ['id' => $id])->row();
        $lama           = $this->db->get_where('barang', ['id' => $hilang->barang_id])->row();
        $baru           = $this->db->get_where('barang', ['id' => $barang_id])->row();

        $data = [
            'barang_id'     => $barang_id,
            'tgl'               => $this->input->post('tgl'),
            'jml'               => $jml,
            'ket'               => $this->input->post('ket'),
        ];

        if ($hilang->barang_id == $barang_id) {
            if ($jml > $hilang->jml) {
                $sisa = $jml - $hilang->jml;
                $res  = $lama->jml - $sisa;
            } else {
                $sisa = $hilang->jml - $jml;
                $res  = $lama->jml + $sisa;
            }
            $this->m_app->ubah('barang', ['jml' => $res], $lama->id);
        } else {
            $this->m_app->ubah('barang', ['jml' => $baru->jml - $jml], $barang_id);            
            $this->m_app->ubah('inventaris', ['jml' => $lama->jml + $hilang->jml], $lama->id);            
        }

        $this->m_app->ubah('hilang', $data, $id);            
        $this->session->set_flashdata('success', 'Berhasil Mengedit Data');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deletedata($table, $id) {

        if ($table == 'jenis') {
            $cek = $this->db->get_where('barang', ['jenis_id' => $id])->num_rows();
            if ($cek > 0) {
                $this->session->set_flashdata('warning', 'Data barang dengan jenis yang anda pilih masih tersedia');
            } else {
                $this->m_app->hapus($table, $id);
                $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
            }
        } else if($table == 'ruangan') {
            $cek = $this->db->get_where('barang', ['ruangan_id' => $id])->num_rows();
            if ($cek > 0) {
                $this->session->set_flashdata('warning', 'Data barang dengan jenis yang anda pilih masih tersedia');
            } else {
                $this->m_app->hapus($table, $id);
                $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
            }
        } else if($table == 'hilang') {
            $hilang  = $this->db->get_where('hilang', ['id' => $id])->row();
            $bg      = $this->db->get_where('barang', ['id' => $hilang->barang_id])->row();

            $this->m_app->ubah('barang', ['jml' => $bg->jml + $hilang->jml], $bg->id);            
            $this->m_app->hapus($table, $id);
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        } else {
            $this->m_app->hapus($table, $id);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

}