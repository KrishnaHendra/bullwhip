<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bagian extends CI_Controller
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
        $data['konten'] = 'page/bagian';
        $data['active'] = 'bagian';
        $data['list'] = $this->model->getData('bagian');
        $this->load->view('page/template', $data);
    }

    public function tambah()
    {
        $this->model->tambahData('bagian');
        $this->session->set_flashdata('notif', 'tambah_sukses');
        redirect('bagian');
    }

    public function edit()
    {
        $this->model->editData('bagian');
        $this->session->set_flashdata('notif', 'edit_sukses');
        redirect('bagian');
    }

    public function hapus()
    {
        $this->model->hapusData('bagian');
        $this->session->set_flashdata('notif', 'hapus_sukses');
        redirect('bagian');
    }
}
