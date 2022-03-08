<?php
defined('BASEPATH') or exit('No direct script access allowes');

class M_auth extends CI_Model
{
    public function login_user($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }

    public function login_supplier($email, $password)
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }

    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function register_supplier($data)
    {
        $this->db->insert('supplier', $data);
    }

    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('status=2');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function akun()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user= ', $id);
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function update($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }

    public function akun_supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $this->session->userdata('id_supplier'));
        $this->db->order_by('id_supplier', 'desc');
        return $this->db->get()->result();
    }

    public function update_supplier($data)
    {
        $this->db->where('id_supplier', $data['id_supplier']);
        $this->db->update('supplier', $data);
    }
}
