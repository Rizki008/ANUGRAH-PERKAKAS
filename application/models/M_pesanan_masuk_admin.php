<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk_admin extends CI_Model
{
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->where('status_pesan=0');
        $this->db->where('user.status', 'customer');
        $this->db->order_by('id_pesanan', 'desc');
        return  $this->db->get()->result();
    }

    public function update_order($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }

    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('status_pesan=1');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->where('user.status', 'customer');
        $this->db->order_by('id_pesanan', 'desc');
        return  $this->db->get()->result();
    }

    public function konfirmasi_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('status_pesan=2');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->where('user.status', 'customer');
        $this->db->order_by('id_pesanan', 'desc');
        return  $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('barang_customer', $data);
    }

    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->where('status_pesan=3');
        $this->db->where('user.status', 'customer');
        $this->db->order_by('id_pesanan', 'desc');
        return  $this->db->get()->result();
    }

    public function pesanan_batal()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->where('user.status', 'customer');
        $this->db->where('status_pesan=4');
        $this->db->order_by('id_pesanan', 'desc');
        return  $this->db->get()->result();
    }
}
 
 /* End of file M_pesanan_masuk.php */
