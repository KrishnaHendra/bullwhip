<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengambilan extends CI_Controller
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
        $data['konten'] = 'page/pengambilan';
        $data['active'] = 'pengambilan';
        $data['list'] = $this->model->getData('pengambilan');
        $this->load->view('page/template', $data);
    }

    public function tambah()
    {
        $this->model->tambahData('pengambilan');
        $this->session->set_flashdata('notif', 'tambah_sukses');
        redirect('pengambilan');
    }

    public function edit()
    {
        $this->model->editData('pengambilan');
        $this->session->set_flashdata('notif', 'edit_sukses');
        redirect('pengambilan');
    }

    public function hapus()
    {
        $this->model->hapusData('pengambilan');
        $this->session->set_flashdata('notif', 'hapus_sukses');
        redirect('pengambilan');
    }
}
