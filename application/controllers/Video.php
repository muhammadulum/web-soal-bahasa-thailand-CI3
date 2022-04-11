<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->model('Video_model');
        $this->load->model('GambarModel');
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data = konfigurasi('Video');
        $data['row'] = $this->Video_model->get();
        $this->template->load('layouts/template', 'admin/video', $data);
    }


    public function add()
    {
        $data = konfigurasi('Video');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layouts/template', 'admin/tambah_video', $data);
        } else {
            $post = $this->input->post(null, TRUE);

                        $upload2 = $this->GambarModel->upload_video();
      
                        if($upload2['result'] == "success"){ 
                           
                            $this->GambarModel->add_video($post);
                            if ($this->db->affected_rows() > 0) {
                                echo "<script>alert('Data berhasil disimpan');</script>";
                            }
                            echo "<script>window.location='" . site_url('video') . "';</script>";
                          
                        }else{ 
                            $a=$upload2['error'];
                            echo "<script>alert('.$a.');</script>";
                           
                        }
                    
                    echo "<script>window.location='" . site_url('video') . "';</script>";
                  
               

            
           
        }
    }

    public function edit($id)
    {
        $data = konfigurasi('Edit Video');
         $this->form_validation->set_rules('judul', 'Judul', 'required');
      
         if ($this->form_validation->run() == FALSE) {
            $query = $this->Video_model->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('layouts/template', 'admin/edit_video', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('video') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
                    $upload2 = $this->GambarModel->upload_video();
  
                    if($upload2['result'] == "success"){ 
                       
                        $this->GambarModel->edit_db_video($post);
                        if ($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil disimpan');</script>";
                        }
                        echo "<script>window.location='" . site_url('video') . "';</script>";
                      
                    }else{ 
                        $a=$upload2['error'];
                        echo "<script>alert('.$a.');</script>";
                       
                    }
                
                echo "<script>window.location='" . site_url('video') . "';</script>";
              
            
        }
        
    }



    public function del()
    {
        $id = $this->input->post('id');
        $this->Video_model->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('video') . "';</script>";
    }
}
