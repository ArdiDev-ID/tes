<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function index() {
        $this->load->model('Order_model');
        $data['title'] = 'Profile Saya';
        $data['profile'] = [
            'name' => 'Ardi Pratama',
            'username' => '@ardiakun',
            'email' => 'ardi@email.com',
            'phone' => '0812-3456-7890',
            'birth_date' => '12 Mei 2001',
            'gender' => 'Laki-laki',
            'member_since' => 'Jan 2024',
            'address' => 'Jl. Sudirman No. 123, Jakarta 10220, Indonesia',
        ];
        $data['stats'] = $this->Order_model->getBuyerPurchaseStats();
        $data['stats']['wishlist'] = 12;

        $this->load->view('layouts/header', $data);
        $this->load->view('buyer/profile', $data);
        $this->load->view('layouts/footer');
    }
}
