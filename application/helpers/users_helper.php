<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('get_user_image')) {
    function get_user_image($user_image = null, $size = '160x160') {
        $ci =& get_instance();
        
        if(empty($user_image)) {
            $user_image = $ci->session->userdata('image');
        }
        
        // Gunakan path yang benar berdasarkan test Anda
        $default_image = 'mynota/assets/dist/img/default-150x150.jpg';

        if(!empty($user_image) && file_exists(FCPATH.'uploads/users/'.$user_image)) {
            $image_src = base_url('uploads/users/'.$user_image);
        } else {
            $image_src = base_url($default_image);
        }

        // Perbaikan: tambahkan unit px pada width dan height
        return '<img src="'.$image_src.'" class="img-circle elevation-2" alt="User Image"
            style="width: 160px; height: 160px; object-fit: cover;">';
    }
}