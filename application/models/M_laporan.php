<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'barang.id_barang = pesanan.id_barang', 'left');
        $this->db->where('DAY(pesanan.tgl_pesan)', $tanggal);
        $this->db->where('MONTH(pesanan.tgl_pesan)', $bulan);
        $this->db->where('YEAR(pesanan.tgl_pesan)', $tahun);
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'barang.id_barang = pesanan.id_barang', 'left');
        $this->db->where('MONTH(tgl_pesan)', $bulan);
        $this->db->where('YEAR(tgl_pesan)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'barang.id_barang = pesanan.id_barang', 'left');
        $this->db->where('YEAR(tgl_pesan)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');

        return $this->db->get()->result();
    }
}

/* End of file M_laporan.php */
