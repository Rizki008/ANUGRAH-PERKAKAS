<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_supplier');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Kategori',
            'kategori' => $this->m_kategori->kategori(),
            'isi' => 'layout/supplier/barang/v_kategori'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'id_supplier' => $this->session->userdata('id_supplier'),
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        $this->m_kategori->add($data);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Ditambah');
        redirect('kategori');
    }

    public function update($id_kategori = NULL)
    {
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        $this->m_kategori->update($data);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Ditambah');
        redirect('kategori');
    }

    public function delete($id_kategori = NULL)
    {
        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Ditambah');
        redirect('kategori');
    }
}
