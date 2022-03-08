<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_supplier');
        $this->load->model('m_auth');
        $this->load->model('m_customer');
        $this->load->model('m_barang');
        $this->load->model('m_admin');
        $this->load->model('m_order');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Customer',
            'isi' => 'v_customer'
        );
        $this->load->view('layout/customer/v_wrapper', $data, FALSE);
    }

    public function data_pesan()
    {
        $data = array(
            'title' => 'Data Pesan',
            'customer' => $this->m_customer->order(),
            'isi' => 'layout/customer/order/v_data_pesan'
        );
        $this->load->view('layout/customer/v_wrapper', $data, FALSE);
    }

    public function pesan()
    {
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required', array('required' => '%s Mohon Di pilih'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Order Bahan Mentah',
                'barang' => $this->m_barang->barang_toko(),
                'user' => $this->m_auth->user(),
                'isi' => 'layout/customer/order/v_order'
            );
            $this->load->view('layout/customer/v_wrapper', $data, FALSE);;
        } else {
            //simpan ke tabel transaksi
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'status' => $this->session->userdata('status'),
                'id_barang' => $this->input->post('id_barang'),
                'no_pesanan' => $this->input->post('no_pesanan'),
                'tgl_pesan' => date('Y-m-d'),
                'status_bayar' => '0',
                'status_pesan' => '0',
                'qty' => $this->input->post('qty'),
            );
            $this->m_customer->simpan_pesanan($data);

            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
            redirect('customer/data_pesan');
        }
    }

    public function detail_pesanan($no_pesanan)
    {
        $data = array(
            'title' => 'Detail Pesanan Anda',
            'invoice' => $this->m_customer->invoice($no_pesanan),
            'isi' => 'layout/customer/order/v_bayar'
        );
        $this->load->view('layout/customer/v_wrapper', $data, FALSE);
    }

    public function bayar($id_pesanan)
    {
        $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "bukti_bayar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->m_customer->detail_pesanan($id_pesanan),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/customer/order/v_lunas'
                );
                $this->load->view('layout/customer/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_pesanan' => $id_pesanan,
                    'jumlah_bayar' => $this->input->post('jumlah_bayar'),
                    'status_bayar' => '1',
                    'status_pesan' => '2',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->m_customer->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
                redirect('customer/data_pesan');
            }
        }

        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_customer->detail_pesanan($id_pesanan),
            'isi' => 'layout/customer/order/v_lunas'
        );
        $this->load->view('layout/customer/v_wrapper', $data, FALSE);
    }

    public function akun()
    {
        $data = array(
            'title' => 'Data Profil',
            'akun' => $this->m_auth->akun(),
            'barang' => $this->m_order->barang(),
            'isi' => 'layout/customer/akun/v_akun'
        );
        $this->load->view('layout/customer/v_wrapper', $data, FALSE);
    }

    public function update($id_user)
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'no_tlpn' => $this->input->post('no_tlpn'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'status' => 'customer',
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        redirect('customer/akun');
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
                'isi' => 'layout/customer/akun/v_akun'
            );
            $this->load->view('layout/customer/v_wrapper', $data, FALSE);
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
            redirect('customer/akun');
        }
    }

    public function barang()
    {
        $data = array(
            'title' => 'Data barang',
            'barang_selesai' => $this->m_customer->barang(),
            'isi' => 'layout/customer/barang/v_barang'
        );
        $this->load->view('layout/customer/v_wrapper', $data, FALSE);
    }
}
