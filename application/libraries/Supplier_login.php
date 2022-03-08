<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_supplier($email, $password);
        if ($cek) {
            $id_supplier = $cek->id_supplier;
            $nama = $cek->nama;
            $email = $cek->email;
            $no_tlpn = $cek->no_tlpn;
            $alamat = $cek->alamat;
            $status = $cek->status;

            //session
            $this->ci->session->set_userdata('id_supplier', $id_supplier);
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('no_tlpn', $no_tlpn);
            $this->ci->session->set_userdata('alamat', $alamat);
            $this->ci->session->set_userdata('status', $status);

            redirect('supplier');
        } else {
            $this->ci->session->set_flashdata('error', 'email Atau Password Salah');
            redirect('auth/login_supplier');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('nama') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_supplier');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_supplier');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->set_userdata('no_tlpn');
        $this->ci->session->set_userdata('alamat');
        $this->ci->session->unset_userdata('status');
        $this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
        redirect('auth/login_supplier');
    }
}
