<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('User_model');
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('User');
        $data['row'] = $this->User_model->get();
        $this->template->load('layouts/template', 'admin/user', $data);
    }




    public function del()
    {
        $id = $this->input->post('id');
        $this->User_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "';</script>";
    }
}
