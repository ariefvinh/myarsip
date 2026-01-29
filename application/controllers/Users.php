<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Users';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('users');
        $this->load->view('template/footer');
    }
}
