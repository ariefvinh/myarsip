<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level'  => $row->level
                );
                $this->session->set_userdata($params);

                // flashdata sukses
                $this->session->set_flashdata('success', 'Selamat datang!');
                redirect('dashboard');

            } else {
                // flashdata error
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth/login');
            }
        }
    }


}
