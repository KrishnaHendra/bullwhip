<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
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
        $data['konten'] = 'page/pemesanan';
        $data['active'] = 'pemesanan';
        $data['list'] = $this->model->getPesanan();
        $data['listBarang'] = $this->model->getData('barang');
        $this->load->view('page/template', $data);
    }

    public function tambah()
    {
        $this->model->tambahData('pemesanan');
        $this->session->set_flashdata('notif', 'tambah_sukses');
        redirect('pemesanan');
    }

    public function edit()
    {
        $this->model->editData('pemesanan');
        $this->session->set_flashdata('notif', 'edit_sukses');
        redirect('pemesanan');
    }

    public function hapus()
    {
        $this->model->hapusData('pemesanan');
        $this->session->set_flashdata('notif', 'hapus_sukses');
        redirect('pemesanan');
    }
}
