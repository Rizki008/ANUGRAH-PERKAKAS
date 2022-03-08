<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_supplier');
        $this->load->model('m_auth');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Supplier',
            'jml_pesanan' => $this->m_supplier->jml_pesan(),
            'jml_barang' => $this->m_supplier->jml_barang(),
            'isi' => 'v_supplier'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function akun()
    {
        $data = array(
            'title' => 'Data Profil',
            'akun_supplier' => $this->m_auth->akun_supplier(),
            // 'barang' => $this->m_order->barang(),
            'isi' => 'layout/supplier/akun/v_akun'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function update($id_supplier)
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'no_tlpn' => $this->input->post('no_tlpn'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'status' => 'supplier',
        );
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
        redirect('supplier/akun');
    }
    public function edit_gambar($id_supplier)
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
                // 'barang' => $this->m_order->barang(),
                'error_upload' => $this->upload->display_errors(),
                'isi' => 'layout/supplier/akun/v_akun'
            );
            $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
        } else {

            $upload_data = array('uploads' => $this->upload->data());
            $config['image_liblary'] = 'gd2';
            $config['source_image'] = './assets/profil' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'gambar' => $upload_data['uploads']['file_name']
            );
            $this->db->where('id_supplier', $id_supplier);
            $this->db->update('supplier', $data);
            redirect('supplier/akun');
        }
    }
}
