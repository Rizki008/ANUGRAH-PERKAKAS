<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_supplier');
        $this->load->model('m_auth');
        $this->load->model('m_order');
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Supplier',
            'akun' => $this->m_auth->akun(),
            'isi' => 'v_admin'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
    }

    public function data_barang()
    {
        $data = array(
            'title' => 'Data Barang',
            'barang_selesai_pesan' => $this->m_order->barang(),
            'isi' => 'layout/admin/barang/v_barang'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
    }

    public function akun()
    {
        $data = array(
            'title' => 'Data Profil',
            'akun' => $this->m_auth->akun(),
            'barang' => $this->m_order->barang(),
            'isi' => 'layout/admin/akun/v_akun'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
    }

    public function update($id_user)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_tlpn' => $this->input->post('no_tlpn'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'status' => 'admin',
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        redirect('admin/akun');
    }

    public function edit_gambar($id_user)
    {

        $config['upload_path'] = './assets/profil';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
        $config['max_size']     = '5000';
        $this->upload->initialize($config);
        $field_name = "gambar";
        if (!$this->upload->do_upload($field_name)) {
            $data = array(
                'title' => 'Edit Barang',
                'akun' => $this->m_auth->akun(),
                'barang' => $this->m_order->barang(),
                'error_upload' => $this->upload->display_errors(),
                'isi' => 'layout/admin/akun/v_akun'
            );
            $this->load->view('layout/admin/v_wrapper', $data, FALSE);
        } else {

            $upload_data = array('uploads' => $this->upload->data());
            $config['image_liblary'] = 'gd2';
            $config['source_image'] = './assets/profil' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'gambar' => $upload_data['uploads']['file_name']
            );
            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data);
            redirect('admin/akun');
        }
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk_admin->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk_admin->pesanan_diproses(),
            'konfirmasi_pembayaran' => $this->m_pesanan_masuk_admin->konfirmasi_pembayaran(),
            'pesanan_selesai' => $this->m_pesanan_masuk_admin->pesanan_selesai(),
            'pesanan_batal' => $this->m_pesanan_masuk_admin->pesanan_batal(),
            'isi' => 'layout/admin/pesanan/v_pesanan_masuk'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
    }

    public function proses($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'status_pesan' => 1
        );
        $this->m_pesanan_masuk_admin->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        redirect('admin/pesanan_masuk');
    }

    public function proses_bayar($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'status_pesan' => 3
        );
        $this->m_pesanan_masuk_admin->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        $datasatu = array(
            'id_pesanan' => $id_pesanan,
        );
        $this->m_pesanan_masuk_admin->add($datasatu);
        redirect('admin/pesanan_masuk');
    }

    public function batal($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'catatan' => $this->input->post('catatan'),
            'status_pesan' => 4
        );
        $this->m_pesanan_masuk_admin->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
        redirect('pesanan');
    }
}
