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

    
}
