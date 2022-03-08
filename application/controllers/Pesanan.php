<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_supplier');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'konfirmasi_bayar' => $this->m_pesanan_masuk->konfirmasi_bayar(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'pesanan_batal' => $this->m_pesanan_masuk->pesanan_batal(),
            'isi' => 'layout/supplier/pesanan/v_pesanan'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function proses($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'status_pesan' => 1
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        redirect('pesanan');
    }

    public function konfirmasi_bayar($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'status_pesan' => 3
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        $datasatu = array(
            'id_pesanan' => $id_pesanan,
        );
        $this->m_pesanan_masuk->add($datasatu);
        redirect('pesanan');
    }

    public function batal($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'catatan' => $this->input->post('catatan'),
            'status_pesan' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
        redirect('pesanan');
    }
}

/* End of file Controllername.php */
