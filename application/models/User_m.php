<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    var $table = 'user';

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }
    // Tampil data
    public function get($id = null)
    {
        $this->db->from($this->table);
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    // Get user by ID untuk cetak nama pada session login
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    // Tambah data
    public function add($data)
    {
        $params = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'name' => $data['name'],
            'address' => $data['address'],
            'level' => $data['level'],
            'image' => $data['image'],
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert($this->table, $params);
        return $this->db->insert_id();
    }

    
}
