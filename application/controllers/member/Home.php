<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
		$data = konfigurasi('Dashboard');
        $this->template->load('layouts/template', 'member/dashboard', $data);
    }
    public function alfabet()
    {
		$data = konfigurasi('Alfabet');
        $this->template->load('layouts/template', 'member/alfabet', $data);
    }
    public function kata()
    {
		$data = konfigurasi('Kata');
        $this->template->load('layouts/template', 'member/kata', $data);
    }
    public function video()
    {
		$data = konfigurasi('Video');
        $this->template->load('layouts/template', 'member/video', $data);
    }
}
