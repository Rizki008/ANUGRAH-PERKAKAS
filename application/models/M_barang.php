<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where(
            'id_supplier',
            $this->session->userdata('id_supplier')
        );
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function barang_toko()
    {
        $this->db->select('*');
        $this->db->from('barang_toko');
        $this->db->join('pesanan', 'barang_toko.id_pesanan = pesanan.id_pesanan', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->order_by('id_barang_toko', 'desc');
        return $this->db->get()->result();
    }

    public function barang_pesan()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('supplier', 'barang.id_supplier = supplier.id_supplier', 'left');
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_barang)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('barang', $data);
    }

    public function update($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('barang');
    }
}
