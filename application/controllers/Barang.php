<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $data = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();
        if (!isset($data)) {
            redirect('auth');
        }
        $this->load->model('Global_mdl', 'model');
    }

    public function index()
    {
        $data['konten'] = 'page/barang';
        $data['active'] = 'barang';
        $data['list'] = $this->model->getData('barang');
        $this->load->view('page/template', $data);
    }

    public function tambah()
    {
        $this->model->tambahData('barang');
        $this->session->set_flashdata('notif', 'tambah_sukses');
        redirect('barang');
    }

    public function edit()
    {
        $this->model->editData('barang');
        $this->session->set_flashdata('notif', 'edit_sukses');
        redirect('barang');
    }

    public function hapus()
    {
        $this->model->hapusData('barang');
        $this->session->set_flashdata('notif', 'hapus_sukses');
        redirect('barang');
    }
}
