<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GambarModel extends CI_Model
{

  public function upload()
  {
    $config['upload_path'] = './assets/uploads/images/alfabet/';
    $config['allowed_types'] = 'jpg|png|jpeg|m4a|mp3';
    $config['max_size']  = '10048';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  public function edit_file_alfabet()
  {
    $config['upload_path'] = './assets/uploads/images/alfabet/';
    $config['allowed_types'] = 'jpg|png|jpeg|m4a|mp3';
    $config['max_size']  = '10048';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }


  public function upload_kata()
  {
    $config['upload_path'] = './assets/uploads/images/kata/';
    $config['allowed_types'] = 'jpg|png|jpeg|m4a|mp3';
    $config['max_size']  = '10048';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('gambar')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }


  public function upload_video()
  {
    $config['upload_path'] = './assets/uploads/video/';
    $config['allowed_types'] = 'mp4|jpg|png|';
    $config['max_size']  = '30048';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('video')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }




  public function upload_mp3()
  {
    $config['upload_path'] = './assets/uploads/music/alfabet/';
    $config['allowed_types'] = 'm4a|mp3';
    $config['max_size']  = '10000';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('uploadSong')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  public function edit_mp3_alfabet()
  {
    $config['upload_path'] = './assets/uploads/music/alfabet/';
    $config['allowed_types'] = 'm4a|mp3';
    $config['max_size']  = '10000';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('uploadSong')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }


  public function upload_mp3_kata()
  {
    $config['upload_path'] = './assets/uploads/music/kata/';
    $config['allowed_types'] = 'm4a|mp3';
    $config['max_size']  = '10000';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('uploadSong')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    } else {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }


  public function add_alfabet($post)
  {
    $params['judul'] = $post['judul'];
    $params['kategori'] = $post['kategori'];
    $params['keterangan'] = $post['keterangan'];
    $params['gambar'] = $_FILES['gambar']['name'];
    $params['suara'] = $this->upload->data('file_name');

    $this->db->insert('tbl_alfabet', $params);
  }

  public function edit_db_alfabet($post)
  {
    $params['judul'] = $post['judul'];
    $params['kategori'] = $post['kategori'];
    $params['keterangan'] = $post['keterangan'];
    $params['gambar'] = $_FILES['gambar']['name'];
    $params['suara'] = $this->upload->data('file_name');

    $this->db->where('id', $post['id']);
    $this->db->update('tbl_alfabet', $params);
  }

  public function add_kata($post)
  {
    $params['kata'] = $post['kata'];
    $params['keterangan'] = $post['keterangan'];
    $params['kata_thai'] = $post['kata_thai'];
    // $params['gambar'] = $_FILES['gambar']['name'];
    $params['suara'] = $this->upload->data('file_name');

    $this->db->insert('tbl_kata', $params);
  }

  public function add_video($post)
  {
    $params['judul_video'] = $post['judul'];
    $params['file'] = $this->upload->data('file_name');
    $params['keterangan'] = $post['keterangan'];

    $this->db->insert('tbl_video', $params);
  }

  public function edit_db_kata($post)
  {
    $params['kata'] = $post['kata'];
    $params['keterangan'] = $post['keterangan'];
    $params['kata_thai'] = $post['kata_thai'];
    // $params['gambar'] = $_FILES['gambar']['name'];
    $params['suara'] = $this->upload->data('file_name');

    $this->db->where('id', $post['id']);
    $this->db->update('tbl_kata', $params);
  }


  public function edit_db_video($post)
  {
    $params['judul_video'] = $post['judul'];
    $params['keterangan'] = $post['keterangan'];
    $params['file'] = $this->upload->data('file_name');

    $this->db->where('id', $post['id']);
    $this->db->update('tbl_video', $params);
  }



  public function edit($id)
  {
    $params['foto'] = $this->upload->data('file_name');
    $this->db->where('user_id', $id);
    $this->db->update('user', $params);
  }
}
