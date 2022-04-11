<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('LatihanModel');
    }

    public function index()
    {
        $data = konfigurasi('Latihan');
        // $data['row'] = $this->User_model->get();
        $this->template->load('layouts/template', 'admin/latihan', $data);
    }

    public function list_latihan()
    {
        $data = konfigurasi('Latihan');
        $this->template->load('layouts/template', 'member/list_latihan', $data);
    }

    public function add()
    {
        $post = $this->input->post(null, TRUE);
        $this->LatihanModel->add($post);
    }

    public function get()
    {
        $list = $this->LatihanModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $value) {
            $row = array();
            $row[] = $value->id_latihan;
            $row[] = $value->nama_latihan;
            $row[] = $value->deskripsi;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->LatihanModel->count_all(),
            "recordsFiltered" => $this->LatihanModel->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }


    public function get_latihan()
    {
        $list = $this->LatihanModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $value) {
            $row = array();
            $row[] = $value->id_latihan;
            $row[] = $value->nama_latihan;
            $count = $this->LatihanModel->getcount_soal($value->id_latihan);
            $row[] = $count;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->LatihanModel->count_all(),
            "recordsFiltered" => $this->LatihanModel->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function delete()
    {
        $id = $this->input->post('id_latihan');
        $this->LatihanModel->delete($id);
    }

    public function edit_latihan()
    {
        $post = $this->input->post(null, TRUE);
        $this->LatihanModel->edit($post);
    }
}
