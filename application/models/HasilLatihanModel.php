<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilLatihanModel extends CI_Model
{

    public function get($id)
    {
        $this->db->select('hl.id_latihan, hl.list_soal, hl.list_jawaban, hl.jumlah_benar, hl.nilai_bobot, hl.tgl_mulai,
        u.first_name, u.last_name, u.username, u.email, u.phone, l.nama_latihan, l.deskripsi');
        $this->db->where('hl.id_latihan', $id);
        $this->db->where('hl.id_user', $this->session->userdata('id'));
        $this->db->join('tbl_user u', 'u.id = hl.id_user', 'left');
        $this->db->join('tbl_latihan l', 'l.id_latihan = hl.id_latihan', 'left');
        $this->db->from('tbl_hasil_latihan hl');
        $query = $this->db->get();
        return $query;
    }

    public function get_detail($post)
    {
        $this->db->select('hl.id_latihan,hl.id_user, hl.list_soal, hl.list_jawaban, hl.jumlah_benar, hl.nilai_bobot, hl.tgl_mulai,
        u.first_name, u.last_name, u.username, u.email, u.phone, l.nama_latihan, l.deskripsi');
        $this->db->where('hl.id_latihan', $post['id_latihan']);
        $this->db->where('hl.id_user', $post['id_user']);
        $this->db->join('tbl_user u', 'u.id = hl.id_user', 'left');
        $this->db->join('tbl_latihan l', 'l.id_latihan = hl.id_latihan', 'left');
        $this->db->from('tbl_hasil_latihan hl');
        $query = $this->db->get();
        return $query;
    }

    public function get_latihan($id = null)
    {
        $this->db->from('tbl_latihan');
        if ($id != null) {
            $this->db->where('id_latihan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_hasil_all($id_lat)
    {
        $this->db->select('hl.id_hasil,hl.id_latihan, hl.id_user, hl.nilai_bobot, hl.tgl_mulai, u.first_name, u.last_name, l.nama_latihan');
        $this->db->where('hl.id_latihan', $id_lat);
        $this->db->join('tbl_user u', 'u.id = hl.id_user', 'left');
        $this->db->join('tbl_latihan l', 'l.id_latihan = hl.id_latihan', 'left');
        $this->db->from('tbl_hasil_latihan hl');
        $query = $this->db->get();
        return $query;
    }

    public function get_hasil_user($id_lat, $id_us)
    {
        $this->db->where('id_latihan', $id_lat);
        $this->db->where('id_user', $id_us);
        $this->db->from('tbl_hasil_latihan');
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id_hasil', $id);
        $this->db->delete('tbl_hasil_latihan');
    }
}
