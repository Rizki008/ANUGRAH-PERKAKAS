<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_order');
        $this->load->model('m_auth');
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data = array(
            'title' => 'Data Pesanan',
            'order' => $this->m_order->order(),
            'isi' => 'layout/admin/order/v_data_pesan'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
    }

    public function pesan()
    {
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required', array('required' => '%s Mohon Di pilih'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Order Bahan Mentah',
                'barang' => $this->m_barang->barang_pesan(),
                'user' => $this->m_auth->user(),
                'isi' => 'layout/admin/order/v_order'
            );
            $this->load->view('layout/admin/v_wrapper', $data, FALSE);;
        } else {
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
            $this->m_order->simpan_pesanan($data);
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
            redirect('order');
        }
    }

    public function detail_pesanan($no_pesanan)
    {
        $data = array(
            'title' => 'Detail Pesanan Anda',
            'invoice' => $this->m_order->invoice($no_pesanan),
            'isi' => 'layout/admin/order/v_bayar'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
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
                    'pesanan' => $this->m_order->detail_pesanan($id_pesanan),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/admin/order/v_pembayaran'
                );
                $this->load->view('layout/admin/v_wrapper', $data, FALSE);
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
                $this->m_order->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
                redirect('order');
            }
        }

        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_order->detail_pesanan($id_pesanan),
            'isi' => 'layout/admin/order/v_pembayaran'
        );
        $this->load->view('layout/admin/v_wrapper', $data, FALSE);
    }
}

/* End of file Order.php */
