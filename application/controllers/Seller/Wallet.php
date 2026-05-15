<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {
    public function index() {
        $data['title']='Seller Wallet';
        $this->load->view('layouts/header',$data);
        $this->load->view('seller/placeholder',[ 'module'=>'Wallet' ]);
        $this->load->view('layouts/footer');
    }
}
