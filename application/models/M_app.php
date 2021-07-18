<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_app extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    // Cek Username

    function cek_username($username) {
    	$this->db->where('username', $username);
    	return $this->db->get('users');
    }

    function jenis() {
        return $this->db->order_by('nm_jenis', 'asc')->get('jenis');
    }

    function ruangan() {
        return $this->db->order_by('nm_ruangan', 'asc')->get('ruangan');
    }

    function barang($id = null) {
        $this->db->select('barang.*, jenis.nm_jenis, ruangan.nm_ruangan');
        $this->db->join('jenis', 'jenis_id = jenis.id');
        $this->db->join('ruangan', 'ruangan_id = ruangan.id');
        if ($id != null) {
            $this->db->where('barang.id', $id);
        }
        return $this->db->get('barang');
    }

    public function kode($table, $ket) {
        $this->db->select('RIGHT(kode, 4) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);
        if ($query->num_rows() != 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = $ket . "-" . $kodemax;
        return $kodejadi;
    }

    function checkkode($table, $kode, $id = null) {
        $this->db->where('kode', $kode);
        if ($id != null) {
            $this->db->where('id !=', $id);
        }
        return $this->db->get($table)->num_rows();
    }

    // Logistik

    function logistik($id = null) {
        $this->db->select('logistik.*, jenis.nm_jenis');
        $this->db->join('jenis', 'jenis_id = jenis.id');
        if ($id != null) {
            $this->db->where('logistik.id', $id);
        }
        return $this->db->get('logistik');
    }
    // Pengguna

    function Pengguna() {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
    // Barang Masuk

    function masuk($bln = null, $th = null) {
        $this->db->select('masuk.*, logistik.nm_logistik');
        $this->db->join('logistik', 'logistik_id = logistik.id');
        $this->db->where('MONTH(masuk.tgl)', $bln)->where('YEAR(masuk.tgl)', $th);
        $this->db->order_by('masuk.tgl', 'desc');
        return $this->db->get('masuk');
    }

    // Barang Keluar
   
    function keluar($bln = null, $th = null) {
        $this->db->select('keluar.*, logistik.nm_logistik');
        $this->db->join('logistik', 'logistik_id = logistik.id');
        $this->db->where('MONTH(keluar.tgl)', $bln)->where('YEAR(keluar.tgl)', $th);
        $this->db->order_by('keluar.tgl', 'desc');
        return $this->db->get('keluar');
    }

    // Barang Rusak

    function rusak($bln = null, $th = null) {
        $this->db->select('rusak.*, logistik.nm_logistik');
        $this->db->join('logistik', 'logistik_id = logistik.id');
        $this->db->where('MONTH(rusak.tgl)', $bln)->where('YEAR(rusak.tgl)', $th);
        $this->db->order_by('rusak.tgl', 'desc');
        return $this->db->get('rusak');
    }

    // Barang Hilang

    function hilang($bln = null, $th = null) {
        $this->db->select('hilang.*, barang.nm_barang, barang.kode');
        $this->db->join('barang', 'barang_id = barang.id');
        if ($bln != null) {
            $this->db->where('MONTH(hilang.tgl)', $bln)->where('YEAR(hilang.tgl)', $th);
        }
        $this->db->order_by('hilang.tgl', 'desc');
        return $this->db->get('hilang');
    }

    // Proses

    function ubah($table, $data, $id) {
    	$this->db->where('id', $id);
    	return $this->db->update($table, $data);
    }

    function hapus($table, $id) {
    	$this->db->where('id', $id);
    	return $this->db->delete($table);
    }

    function hapuspengguna($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}