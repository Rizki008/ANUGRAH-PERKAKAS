<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    // List all your items
    public function notifikasi()
    {
        $this->db->where('status_pesan=1');
        return $this->db->get('pesanan')->num_rows();
    }

    // Add a new item
    public function data_notifikiasi()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        // $this->db->where('pesanan.status=', 'admin');
        $this->db->where('status_pesan=1');
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
        // $this->db->where('pesanan.status=', 'admin');
        $this->db->where('status_pesan=2');
        $this->db->group_by('pesanan.id_pesanan');
        return $this->db->get()->result();
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id = NULL)
    {
    }
}
 
 /* End of file M_admin.php */
