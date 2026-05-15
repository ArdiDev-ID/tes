<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
        $data['title'] = 'Seller Dashboard';
        $data['summary'] = [
            'income' => 12450000,
            'sales' => 156,
            'completed' => 142,
            'rating' => '4.9/5.0',
        ];
        $data['recent_orders'] = [
            ['name' => 'Akun Mobile Legends Epic', 'price' => 85000, 'status' => 'Baru'],
            ['name' => 'Akun PUBG Mobile Crown', 'price' => 120000, 'status' => 'Diproses'],
            ['name' => 'Akun Netflix Premium 1 Bulan', 'price' => 25000, 'status' => 'Diproses'],
            ['name' => 'Akun Spotify Premium 3 Bulan', 'price' => 45000, 'status' => 'Selesai'],
        ];
        $data['top_products'] = [
            ['name' => 'Akun Mobile Legends Epic', 'sold' => 32, 'income' => 2720000, 'stock' => 8],
            ['name' => 'Akun PUBG Mobile Crown', 'sold' => 28, 'income' => 3360000, 'stock' => 5],
            ['name' => 'Akun Netflix Premium 1 Bulan', 'sold' => 25, 'income' => 625000, 'stock' => 12],
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('seller/dashboard', $data);
        $this->load->view('layouts/footer');
    }
}
