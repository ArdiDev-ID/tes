<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {
    public function index() {
        $data['title']='Seller Transactions';
        $this->load->view('layouts/header',$data);
        $this->load->view('seller/placeholder',[ 'module'=>'Transactions' ]);
        $this->load->view('layouts/footer');
    }
}
