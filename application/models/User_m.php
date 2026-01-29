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

    
}
