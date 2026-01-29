<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        
    }
    
    public function index()
    {
        $data['title'] = 'Users';
        // Tampil data user
        $data['row'] = $this->user_m->get();
        // Data untuk combo level
        $data['levels'] = [
            '1' => 'superadmin',
            '2' => 'staff'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('users', $data);
        $this->load->view('template/footer');
    }
    public function tambah_aksi()
    {
        // Load library upload
        $this->load->library('upload');
        
        // Buat folder uploads/users jika belum ada
        $upload_path = './uploads/users/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
        
        // Konfigurasi upload
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'user_'.time(); // Nama file unik
        $config['overwrite'] = false;
        
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('image')) {
            // Upload berhasil
            $image_data = $this->upload->data();
            $image_name = $image_data['file_name'];
            
            // Simpan data ke database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')), // Jangan lupa hash password
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'level' => $this->input->post('level'),
                'image' => $image_name
            );
            
            $this->user_m->add($data);
            
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data user berhasil disimpan');
            } else {
                // Hapus file yang sudah diupload jika gagal simpan ke database
                unlink($upload_path . $image_name);
                $this->session->set_flashdata('error', 'Gagal menyimpan data user');
            }
            
        } else {
            // Upload gagal
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
        }
        
        redirect('users');
    }
}
