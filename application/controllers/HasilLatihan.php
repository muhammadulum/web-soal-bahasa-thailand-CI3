<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilLatihan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('HasilLatihanModel');
    }

    public function index()
    {
        $data = konfigurasi('Hasil Latihan');
        // $data['row'] = $this->HasilLatihanModel->get_latihan();
        $this->template->load('layouts/template', 'admin/hasil_latihan', $data);
    }

    public function index_detail($id)
    {
        $data = konfigurasi('Hasil Latihan');
        $data['row'] = $this->HasilLatihanModel->get_hasil_all($id);
        $this->template->load('layouts/template', 'admin/hasil_latihan_all', $data);
    }

    public function hasil_latihan($id)
    {
        $data = konfigurasi('Hasil Latihan');
        $data['row'] = $this->HasilLatihanModel->get($id);
        $this->template->load('layouts/template', 'member/hasil_latihan', $data);
    }

    public function hasil_latihan_detail()
    {
        $post = $this->input->post(null, TRUE);
        $data = konfigurasi('Hasil Latihan');
        $data['row'] = $this->HasilLatihanModel->get_detail($post);
        $this->template->load('layouts/template', 'admin/hasil_latihan_detail', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id_hasil');
        $id_lat = $this->input->post('id_latihan');
        $this->HasilLatihanModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('hasillatihan/index_detail/' . $id_lat) . "';</script>";
    }
}
