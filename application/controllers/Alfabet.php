<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alfabet extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('Alfabet_model');
        $this->load->model('GambarModel');
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Alfabet');
        $data['row'] = $this->Alfabet_model->get();
        $this->template->load('layouts/template', 'admin/alfabet', $data);
    }

    public function add()
    {
        $data = konfigurasi('Alfabet');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layouts/template', 'admin/tambah_alfabet', $data);
        } else {
            $post = $this->input->post(null, TRUE);

                $upload = $this->GambarModel->upload();
      
                if($upload['result'] == "success"){ 

                        $upload2 = $this->GambarModel->upload_mp3();
      
                        if($upload2['result'] == "success"){ 
                           
                            $this->GambarModel->add_alfabet($post);
                            if ($this->db->affected_rows() > 0) {
                                echo "<script>alert('Data berhasil disimpan');</script>";
                            }
                            echo "<script>window.location='" . site_url('alfabet') . "';</script>";
                          
                        }else{ 
                            $a=$upload2['error'];
                            echo "<script>alert('.$a.');</script>";
                           
                        }
                        // echo "<script>alert('Data berhasil disimpan');</script>";
                    
                    echo "<script>window.location='" . site_url('alfabet') . "';</script>";
                  
                }else{ 
                    $a=$upload['error'];
                    echo "<script>alert('.$a.');</script>";
                   
                }

            
           
        }
    }

    public function edit($id)
    {
        $data = konfigurasi('Edit Alfabet');
         $this->form_validation->set_rules('judul', 'Judul', 'required');
      
         if ($this->form_validation->run() == FALSE) {
            $query = $this->Alfabet_model->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('layouts/template', 'admin/edit_alfabet', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('alfabet') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $upload = $this->GambarModel->edit_file_alfabet();
      
            if($upload['result'] == "success"){ 

                    $upload2 = $this->GambarModel->edit_mp3_alfabet();
  
                    if($upload2['result'] == "success"){ 
                       
                        $this->GambarModel->edit_db_alfabet($post);
                        if ($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil disimpan');</script>";
                        }
                        echo "<script>window.location='" . site_url('alfabet') . "';</script>";
                      
                    }else{ 
                        $a=$upload2['error'];
                        echo "<script>alert('.$a.');</script>";
                       
                    }
                    // echo "<script>alert('Data berhasil disimpan');</script>";
                
                echo "<script>window.location='" . site_url('alfabet') . "';</script>";
              
            }else{ 
                $a=$upload['error'];
                echo "<script>alert('.$a.');</script>";
               
            }
            
        }
        
    }


    public function del()
    {
        $id = $this->input->post('id');
        $this->Alfabet_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('alfabet') . "';</script>";
    }
}
