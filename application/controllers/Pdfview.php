<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('HasilLatihanModel');
    }

    public function index($id)
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Hasil Latihan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Hasil_Latihan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $this->data['row'] = $this->HasilLatihanModel->get($id);
        $html = $this->load->view('member/print', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function indexadmin()
    {
        $post = $this->input->post(null, TRUE);
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Hasil Latihan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Hasil_Latihan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $this->data['row'] = $this->HasilLatihanModel->get_detail($post);
        $html = $this->load->view('member/print', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
