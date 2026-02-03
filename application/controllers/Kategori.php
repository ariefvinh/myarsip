<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function index()
	{
		check_not_login();
		$data['title'] = 'Kategori';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('kategori');
		$this->load->view('template/footer');
	}
}
