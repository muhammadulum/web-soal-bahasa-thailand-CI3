<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kata_model extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_kata');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['alamat'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

  
    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['alamat'];
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_kata');
    }
}