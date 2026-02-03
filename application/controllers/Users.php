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
        $this->load->view('folder_user/users', $data);
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
    public function view($id)
    {
        $query = $this->user_m->get($id);

        if ($query->num_rows() > 0) {
            $data['user'] = $query->row();
            $data['title'] = 'Detail User';
            $data['levels'] = [
                '1' => 'superadmin',
                '2' => 'staff'
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('folder_user/users_view', $data);
            $this->load->view('template/footer');
        } else {
            echo "<script>
                    alert('Data user tidak ditemukan');
                    window.location='".site_url('users')."';
                </script>";
        }
    }
    // form edit
    public function edit()
    {
        $id = $this->input->post('user_id');

        // ambil data user lama
        $user = $this->user_m->get($id)->row();

        $data = [
            'username' => $this->input->post('username'),
            'name'     => $this->input->post('name'),
            'address'  => $this->input->post('address'),
            'level'    => $this->input->post('level'),
        ];

        // password optional
        if ($this->input->post('password')) {
            $data['password'] = sha1($this->input->post('password'));
        }

        // ===== JIKA UPLOAD GAMBAR BARU =====
        if (!empty($_FILES['image']['name'])) {

            $config['upload_path']   = './uploads/users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'user_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_image = $this->upload->data('file_name');
                $data['image'] = $new_image;

                // hapus foto lama
                if ($user->image && file_exists('./uploads/users/'.$user->image)) {
                    unlink('./uploads/users/'.$user->image);
                }

            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('users');
            }
        }

        $this->user_m->update($id, $data);

        $this->session->set_flashdata('success', 'Data & foto berhasil diperbarui');
        redirect('users');
    }




}
