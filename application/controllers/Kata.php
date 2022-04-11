<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kata extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('Kata_model');
        $this->load->model('GambarModel');
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Kata');
        $data['row'] = $this->Kata_model->get();
        $this->template->load('layouts/template', 'admin/kata', $data);
    }


    public function add()
    {
        $data = konfigurasi('Kata');
        $this->form_validation->set_rules('kata', 'Kata', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layouts/template', 'admin/tambah_kata', $data);
        } else {
            $post = $this->input->post(null, TRUE);

                        $upload2 = $this->GambarModel->upload_mp3_kata();
      
                        if($upload2['result'] == "success"){ 
                           
                            $this->GambarModel->add_kata($post);
                            if ($this->db->affected_rows() > 0) {
                                echo "<script>alert('Data berhasil disimpan');</script>";
                            }
                            echo "<script>window.location='" . site_url('kata') . "';</script>";
                          
                        }else{ 
                            $a=$upload2['error'];
                            echo "<script>alert('.$a.');</script>";
                           
                        }
                    
                    echo "<script>window.location='" . site_url('kata') . "';</script>";
        }
    }


    public function edit($id)
    {
        $data = konfigurasi('Edit Kata');
         $this->form_validation->set_rules('kata', 'Kata', 'required');
      
         if ($this->form_validation->run() == FALSE) {
            $query = $this->Kata_model->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('layouts/template', 'admin/edit_kata', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('kata') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);

                    $upload2 = $this->GambarModel->upload_mp3_kata();
  
                    if($upload2['result'] == "success"){ 
                       
                        $this->GambarModel->edit_db_kata($post);
                        if ($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil disimpan');</script>";
                        }
                        echo "<script>window.location='" . site_url('kata') . "';</script>";
                      
                    }else{ 
                        $a=$upload2['error'];
                        echo "<script>alert('.$a.');</script>";
                       
                    }
                echo "<script>window.location='" . site_url('kata') . "';</script>";
            
        }
        
    }



    public function del()
    {
        $id = $this->input->post('id');
        $this->Kata_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('kata') . "';</script>";
    }
}
