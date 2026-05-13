<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {
    public function control() {
        $data['title'] = 'System Control';
        $data['controls'] = [
            ['key' => 'maintenance_mode', 'label' => 'Maintenance Mode', 'enabled' => false],
            ['key' => 'auto_refund', 'label' => 'Auto Refund', 'enabled' => true],
            ['key' => 'require_product_approval', 'label' => 'Wajib Approval Produk', 'enabled' => true],
            ['key' => 'buyer_withdraw_enabled', 'label' => 'Withdraw Buyer Aktif', 'enabled' => true],
            ['key' => 'email_notifications', 'label' => 'Email Notifikasi Aktif', 'enabled' => true],
        ];

        if ($this->input->method() === 'post') {
            $this->session->set_flashdata('auth_success', 'Pengaturan sistem berhasil disimpan.');
            redirect('admin/system-control');
            return;
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('admin/system_control', $data);
        $this->load->view('layouts/footer');
    }
}
