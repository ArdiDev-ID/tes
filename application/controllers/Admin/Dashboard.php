<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
        $data['title'] = 'Admin Dashboard';
        $data['summary'] = [
            'users' => '12.845', 'sellers' => '1.253', 'orders' => '8.932', 'revenue' => '1.234.567.890'
        ];
        $data['recent_orders'] = [
            ['id' => '#AM1245678', 'buyer' => 'Budi Santoso', 'seller' => 'Rizky Store', 'total' => 125000, 'status' => 'Selesai'],
            ['id' => '#AM1245677', 'buyer' => 'Siti Aisyah', 'seller' => 'Digital Store', 'total' => 89000, 'status' => 'Dikemas'],
            ['id' => '#AM1245676', 'buyer' => 'Andi Wijaya', 'seller' => 'Game ID Store', 'total' => 250000, 'status' => 'Dikirim'],
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layouts/footer');
    }
}
