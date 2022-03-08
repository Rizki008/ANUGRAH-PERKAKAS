<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        $this->load->model('m_barang');
        $this->load->model('m_supplier');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data barang',
            'barang' => $this->m_barang->barang(),
            'isi' => 'layout/supplier/barang/v_barang'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required',  array('required' => '%s Mohon Untuk Diisi'));
        // $this->form_validation->set_rules('id_kategori', 'Kategori', 'required',  array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('stock', 'Stock', 'required',  array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('harga', 'harga', 'required',  array('required' => '%s Mohon Untuk Diisi'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '5000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Barang',
                    // 'kategori' => $this->m_kategori->kategori(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/supplier/barang/crud/v_add'
                );
                $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_liblary'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_supplier' => $this->session->userdata('id_supplier'),
                    // 'id_kategori' => $this->input->post('id_kategori'),
                    'stock' => $this->input->post('stock'),
                    'harga' => $this->input->post('harga'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Barang Berhasil Ditambahkan');
                redirect('barang');
            }
        }
        $data = array(
            'title' => 'Tambah Barang',
            // 'kategori' => $this->m_kategori->kategori(),
            'isi' => 'layout/supplier/barang/crud/v_add'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function update($id_barang = NULL)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required',  array('required' => '%s Mohon Untuk Diisi'));
        // $this->form_validation->set_rules('id_kategori', 'Kategori', 'required',  array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('stock', 'Stock', 'required',  array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('harga', 'harga', 'required',  array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '5000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    // 'kategori' => $this->m_kategori->kategori(),
                    'barang' => $this->m_barang->detail($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/supplier/barang/crud/v_update'
                );
                $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
            } else {

                $barang = $this->m_barang->detail($id_barang);
                if ($barang->gambar !== "") {
                    unlink('./assets/gambar/' . $barang->gambar);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_liblary'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_supplier' => $this->session->userdata('id_supplier'),
                    // 'id_kategori' => $this->input->post('id_kategori'),
                    'stock' => $this->input->post('stock'),
                    'harga' => $this->input->post('harga'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->m_barang->update($data);
                $this->session->set_flashdata('pesan', 'Barang Berhasil Ditambahkan');
                redirect('barang');
            }
            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_supplier' => $this->session->userdata('id_supplier'),
                // 'id_kategori' => $this->input->post('id_kategori'),
                'stock' => $this->input->post('stock'),
                'harga' => $this->input->post('harga'),
            );
            $this->m_barang->update($data);
            $this->session->set_flashdata('pesan', 'Barang Berhasil Ditambahkan');
            redirect('barang');
        }
        $data = array(
            'title' => 'Tambah Barang',
            // 'kategori' => $this->m_kategori->kategori(),
            'barang' => $this->m_barang->detail($id_barang),
            'isi' => 'layout/supplier/barang/crud/v_update'
        );
        $this->load->view('layout/supplier/v_wrapper', $data, FALSE);
    }

    public function delete($id_barang = NULL)
    {
        //hapus gambar
        $barang = $this->m_barang->detail($id_barang);
        if ($barang->gambar !== "") {
            unlink('./assets/gambar/' . $barang->gambar);
        }

        $data = array(
            'id_barang' => $id_barang
        );
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('barang');
    }
}
