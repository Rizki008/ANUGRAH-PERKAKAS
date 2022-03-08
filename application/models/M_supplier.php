<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_supplier extends CI_Model
{

    // List all your items
    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function notifikasi()
    {
        $this->db->where('status_pesan=0');
        return $this->db->get('pesanan')->num_rows();
    }

    // Add a new item
    public function data_notifikiasi()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->where('status_pesan=0');
        $this->db->group_by('pesanan.id_pesanan');
        return $this->db->get()->result();
    }

    public function notifikasi_bayar()
    {
        $this->db->where('status_pesan=2');
        return $this->db->get('pesanan')->num_rows();
    }

    // Add a new item
    public function data_notifikiasi_bayar()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->where('status_pesan=2');
        $this->db->group_by('pesanan.id_pesanan');
        return $this->db->get()->result();
    }

    public function jml_barang()
    {
        $this->db->get('barang')->num_rows();
    }

    public function jml_pesan()
    {
        $this->db->get('pesanan')->num_rows();
    }
}

/* End of file M_supplier.php */
