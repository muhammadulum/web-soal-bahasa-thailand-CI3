<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('SoalModel');
        $this->load->model('LatihanModel');
    }

    public function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function index()
    {
        $data = konfigurasi('Soal');
        // $data['row'] = $this->User_model->get();
        $this->template->load('layouts/template', 'admin/soal', $data);
    }

    public function detail_soal($id)
    {
        $data = konfigurasi('Detail Soal');
        $data['row'] = $this->SoalModel->get($id);
        $this->template->load('layouts/template', 'admin/detail_soal', $data);
    }

    public function user()
    {
        $data = konfigurasi('Detail Soal');
        $data['row'] = $this->LatihanModel->get();
        $this->template->load('layouts/template', 'member/latihan', $data);
    }

    public function mengerjakan($id)
    {
        $data = konfigurasi('Detail Soal');
        $data['row'] = $this->SoalModel->get($id);
        $data['detiltes'] = $this->db->query("SELECT * FROM tbl_latihan WHERE id_latihan = '$id'")->row();
        $data['jumsoal'] = $this->db->query("SELECT count(*) as jumlahsoal FROM tbl_soal WHERE id_latihan = '$id'")->row();
        $this->template->load('layouts/template', 'member/mengerjakan', $data);
    }

    public function mengerjakan_ulang($id)
    {
        $data = konfigurasi('Detail Soal');
        $data['row'] = $this->SoalModel->get($id);
        $data['detiltes'] = $this->db->query("SELECT * FROM tbl_latihan WHERE id_latihan = '$id'")->row();
        $data['jumsoal'] = $this->db->query("SELECT count(*) as jumlahsoal FROM tbl_soal WHERE id_latihan = '$id'")->row();
        $this->template->load('layouts/template', 'member/mengerjakan_ulang', $data);
    }

    public function save_jawaban()
    {
        $jumlah_soal = $this->input->post('jml_soal');
        $jumlah_benar = 0;
        $jumlah_bobot = 0;
        $update_ = "";

        for ($i = 1; $i < $this->input->post('jml_soal'); $i++) {
            $_tjawab     = "opsi_" . $i;
            $_tidsoal     = "id_soal_" . $i;

            $jawaban_     = empty($this->input->post($_tjawab)) ? "" : $this->input->post($_tjawab);

            $cek_jwb     = $this->db->query("SELECT bobot, jawaban FROM tbl_soal WHERE id_soal = '" . $this->input->post($_tidsoal) . "'")->row();
            if ($cek_jwb->jawaban == $jawaban_) {
                $jumlah_benar++;
                $jumlah_bobot = $jumlah_bobot + $cek_jwb->bobot;
            }
            $update_    .= "" . $this->input->post($_tidsoal) . ":" . $jawaban_ . ",";
        }
        $update_        = substr($update_, 0, -1);

        $nilai = ($jumlah_benar / ($jumlah_soal - 1)) * 100;

        $id_latihan = $this->input->post('id_latihan');
        $id_user = $this->input->post('id_user');


        $q_soal            = $this->db->query("SELECT id_soal, gambar_soal, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban FROM tbl_soal WHERE id_latihan = '$id_latihan'")->result();
        $list_id_soal    = "";
        $list_jw_soal     = "";
        if (!empty($q_soal)) {
            foreach ($q_soal as $d) {
                $list_id_soal .= $d->id_soal . ",";
            }
        }
        $list_id_soal = substr($list_id_soal, 0, -1);
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y/m/d H:i:s");

        $this->db->query("INSERT INTO tbl_hasil_latihan VALUES (null, '$id_latihan', '$id_user', '$list_id_soal', '$update_', '$jumlah_benar', '$jumlah_bobot', '$nilai', '$date')");
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('sukses_simpan_jawaban', 'Jawaban berhasil disimpan');
        }
        echo "<script>window.location='" . site_url('soal/user') . "';</script>";
    }

    public function edit_jawaban()
    {
        $jumlah_soal = $this->input->post('jml_soal');
        $jumlah_benar = 0;
        $jumlah_bobot = 0;
        $update_ = "";

        for ($i = 1; $i < $this->input->post('jml_soal'); $i++) {
            $_tjawab     = "opsi_" . $i;
            $_tidsoal     = "id_soal_" . $i;

            $jawaban_     = empty($this->input->post($_tjawab)) ? "" : $this->input->post($_tjawab);

            $cek_jwb     = $this->db->query("SELECT bobot, jawaban FROM tbl_soal WHERE id_soal = '" . $this->input->post($_tidsoal) . "'")->row();
            if ($cek_jwb->jawaban == $jawaban_) {
                $jumlah_benar++;
                $jumlah_bobot = $jumlah_bobot + $cek_jwb->bobot;
            }
            $update_    .= "" . $this->input->post($_tidsoal) . ":" . $jawaban_ . ",";
        }
        $update_        = substr($update_, 0, -1);

        $nilai = ($jumlah_benar / ($jumlah_soal - 1)) * 100;

        $id_latihan = $this->input->post('id_latihan');
        $id_user = $this->input->post('id_user');


        $q_soal            = $this->db->query("SELECT id_soal, gambar_soal, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban FROM tbl_soal WHERE id_latihan = '$id_latihan'")->result();
        $list_id_soal    = "";
        $list_jw_soal     = "";
        if (!empty($q_soal)) {
            foreach ($q_soal as $d) {
                $list_id_soal .= $d->id_soal . ",";
            }
        }
        $list_id_soal = substr($list_id_soal, 0, -1);
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y/m/d H:i:s");


        $this->db->query("UPDATE tbl_hasil_latihan SET jumlah_benar = " . $jumlah_benar . ", jumlah_bobot = " . $jumlah_bobot . ", nilai_bobot = '" . $nilai . "', list_jawaban = '" . $update_ . "', tgl_mulai='$date' WHERE id_latihan = '$id_latihan' AND id_user = '" . $id_user . "'");
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('sukses_simpan_jawaban', 'Jawaban berhasil disimpan');
        }
        echo "<script>window.location='" . site_url('soal/user') . "';</script>";
    }

    public function detail_per_soal($id)
    {
        $a = $this->db->query("SELECT * FROM tbl_soal WHERE id_soal = '$id'")->row();
        $this->json($a);
    }

    public function add()
    {
        $post = $this->input->post(null, TRUE);
        $this->SoalModel->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('sukses_add_soal', 'Soal berhasil ditambahkan');
            // echo "<script>alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('soal') . "';</script>";
    }

    public function get_latihan()
    {
        $list = $this->SoalModel->get_datatables();
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
            "recordsTotal" => $this->SoalModel->count_all(),
            "recordsFiltered" => $this->SoalModel->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function delete()
    {
        $id = $this->input->post('id_soal');
        $this->SoalModel->delete($id);
    }

    public function edit()
    {
        $post = $this->input->post(null, TRUE);
        $this->SoalModel->edit($post);
    }
}
