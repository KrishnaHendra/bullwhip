<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $data = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();
        if (!isset($data)) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['konten'] = 'page/home';
        $data['active'] = 'home';
        $this->load->view('page/template', $data);
    }
}
