<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {
    public function index() {
        $this->load->model('Wallet_model');
        $userId = 1;
        $data['title'] = 'Wallet';
        $data['wallet'] = $this->Wallet_model->getWallet($userId);
        $this->load->view('layouts/header', $data);
        $this->load->view('buyer/wallet', $data);
        $this->load->view('layouts/footer');
    }
}
