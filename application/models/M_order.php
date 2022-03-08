<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{

    public function simpan_pesanan($data)
    {
        $this->db->insert('pesanan', $data);
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
    }

    public function simpan_detail_pesanan($data_detail)
    {
        $this->db->insert('detail_pesanan', $data_detail);
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
    }

    public function detail_pesanan($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('id_pesanan', $id_pesanan);
        return $this->db->get()->row();
    }

    public function order()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get()->result();
    }

    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang_toko');
        $this->db->join('pesanan', 'pesanan.id_pesanan = barang_toko.id_pesanan', 'left');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'left');
        $this->db->order_by('id_barang_toko', 'desc');
        return $this->db->get()->result();
    }

    public function invoice($no_pesanan)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'pesanan.id_barang = barang.id_barang', 'left');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'left');
        $this->db->where('pesanan.no_pesanan', $no_pesanan);
        return $this->db->get()->result();
    }
}

/* End of file M_order.php */
