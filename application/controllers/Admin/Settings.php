<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function index() {
        $data['title'] = 'Pengaturan Website';
        $data['tabs'] = ['Umum','Branding','Tampilan','Marketplace','Seller','Produk','Transaksi','Pembayaran','Wallet & Saldo','Escrow','Withdraw','Komisi & Fee','Keamanan','Notifikasi','Email & SMTP','SEO','Maintenance','Integrasi','Legal','Backup & Log'];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/settings_page', $data);
        $this->load->view('layouts/footer');
    }
}
