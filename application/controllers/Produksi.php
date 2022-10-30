<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
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
        $data['konten'] = 'page/produksi';
        $data['active'] = 'produksi';
        $data['list'] = $this->model->getProduksi();
        $this->load->view('page/template', $data);
    }

    public function tambah()
    {
        $this->model->tambahData('produksi');
        $this->session->set_flashdata('notif', 'tambah_sukses');
        redirect('produksi');
    }

    public function edit()
    {
        $this->model->editData('produksi');
        $this->session->set_flashdata('notif', 'edit_sukses');
        redirect('produksi');
    }

    public function hapus()
    {
        $this->model->hapusData('produksi');
        $this->session->set_flashdata('notif', 'hapus_sukses');
        redirect('produksi');
    }
}
