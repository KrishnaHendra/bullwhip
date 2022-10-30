<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
        $data['konten'] = 'page/pegawai';
        $data['active'] = 'pegawai';
        $data['list'] = $this->model->getData('pegawai');
        $data['listBagian'] = $this->model->getData('bagian');
        $this->load->view('page/template', $data);
    }

    public function tambah()
    {
        $this->model->tambahData('pegawai');
        $this->session->set_flashdata('notif', 'tambah_sukses');
        redirect('pegawai');
    }

    public function edit()
    {
        $this->model->editData('pegawai');
        $this->session->set_flashdata('notif', 'edit_sukses');
        redirect('pegawai');
    }

    public function hapus()
    {
        $this->model->hapusData('pegawai');
        $this->session->set_flashdata('notif', 'hapus_sukses');
        redirect('pegawai');
    }
}
