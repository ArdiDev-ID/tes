<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {
    public function index() {
        $data['title']='Seller Withdraw';
        $this->load->view('layouts/header',$data);
        $this->load->view('seller/placeholder',[ 'module'=>'Withdraw' ]);
        $this->load->view('layouts/footer');
    }
}
