<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Global_mdl extends CI_Model
{
    public function getData($table)
    {
        $this->db->select("*");
        $this->db->from($table);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function tambahData($table)
    {
        $post = $this->input->post();
        $arr = [];
        foreach ($post as $key => $val) {
            $arr[$key] = $val;
        }
        $this->db->insert($table, $arr);
    }

    public function editData($table)
    {
        $id = $this->input->post('id');
        $field_name = $this->input->post('field_name');

        $post = $this->input->post();
        $arr = [];
        foreach ($post as $key => $val) {
            if ($key != 'field_name') {
                if ($key != 'id') {
                    $arr[$key] = $val;
                }
            }
        }
        $this->db->where($field_name, $id);
        $this->db->update($table, $arr);
    }

    public function hapusData($table)
    {
        $id = $this->input->post('id');
        $field_name = $this->input->post('field_name');
        $this->db->where($field_name, $id);
        $this->db->delete($table);
    }

    public function getPesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('barang', 'barang.id_barang = pemesanan.id_barang');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getProduksi()
    {
        $this->db->select('*');
        $this->db->from('produksi');
        $this->db->join('pemesanan', 'pemesanan.id_pesanan = produksi.id_pesanan');
        $this->db->join('barang', 'barang.id_barang = produksi.id_barang');
        $data = $this->db->get()->result_array();
        return $data;
    }
}
