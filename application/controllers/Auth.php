<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function login_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->user_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login_user', $data, FALSE);
    }

    public function login_supplier()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->supplier_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Supplier',
        );
        $this->load->view('v_login_supplier', $data, FALSE);
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }

    public function logout_supplier()
    {
        $this->supplier_login->logout();
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi',
            'regex_match' => '%s Mohon Isi Dengan Karakter'
        ));
        $this->form_validation->set_rules('no_tlpn', 'No Telphon', 'required|min_length[11]|max_length[13]|numeric', array(
            'required' => '%s Mohon Untuk Diisi',
            'min_length' => '%s Minimal 11 Angka',
            'max_length' => '%s Maksimal 13 Angka',
            'numeric' => '%s Mohon Inputkan Data Nomor'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon Untuk Diisi',));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]', array(
            'required' => '%s Mohon Untuk Diisi',
            'is_unique' => '%s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon Untuk Diisi',));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi',
            'matches' => '%s Password Tidak Sama'
        ));
        // $this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s Mohon Untuk Diisi',));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Customer',
                'isi' => 'v_register'
            );
            $this->load->view('v_register', $data);
        } else {

            $data = array(
                'nama' => $this->input->post('nama'),
                'no_tlpn' => $this->input->post('no_tlpn'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'status' => 'customer',
            );
            $this->m_auth->register($data);
            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login');
            redirect('auth/login_user');
        }
    }

    public function register_supplier()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi',
            'regex_match' => '%s Mohon Isi Dengan Karakter'
        ));
        $this->form_validation->set_rules('no_tlpn', 'No Telphon', 'required|min_length[11]|max_length[13]|numeric', array(
            'required' => '%s Mohon Untuk Diisi',
            'min_length' => '%s Minimal 11 Angka',
            'max_length' => '%s Maksimal 13 Angka',
            'numeric' => '%s Mohon Inputkan Data Nomor'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon Untuk Diisi',));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]', array(
            'required' => '%s Mohon Untuk Diisi',
            'is_unique' => '%s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon Untuk Diisi',));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi',
            'matches' => '%s Password Tidak Sama'
        ));
        // $this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s Mohon Untuk Diisi',));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Supplier',
                'isi' => 'v_register_supplier'
            );
            $this->load->view('v_register_supplier', $data);
        } else {

            $data = array(
                'nama' => $this->input->post('nama'),
                'no_tlpn' => $this->input->post('no_tlpn'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'status' => 'supplier',
            );
            $this->m_auth->register_supplier($data);
            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login');
            redirect('auth/login_user');
        }
    }
}
