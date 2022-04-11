<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LatihanModel extends CI_Model
{

    var $table = 'tbl_latihan';
    var $column_order = array('id_latihan', 'nama_latihan', 'deskripsi', null);
    var $column_search = array('nama_latihan', 'deskripsi');
    var $order = array('id_latihan' => 'asc');

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function add($post)
    {
        $params['nama_latihan'] = $post['nama_latihan'];
        $params['deskripsi'] = $post['deskripsi'];
        $this->db->insert('tbl_latihan', $params);
    }

    public function getcount_soal($id)
    {
        $this->db->where('id_latihan', $id);
        return $this->db->count_all_results('tbl_soal');
    }

    public function get($id = null)
    {
        $this->db->from('tbl_latihan');
        if ($id != null) {
            $this->db->where('id_latihan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id_latihan', $id);
        $this->db->delete('tbl_latihan');
    }

    public function edit($post)
    {
        $params['nama_latihan'] = $post['nama_latihan'];
        $params['deskripsi'] = $post['deskripsi'];
        $this->db->where('id_latihan', $post['id_latihan']);
        $this->db->update('tbl_latihan', $params);
    }
}
