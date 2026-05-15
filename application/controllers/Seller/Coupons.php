<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends CI_Controller {
    public function index() {
        $data['title']='Seller Coupons';
        $this->load->view('layouts/header',$data);
        $this->load->view('seller/placeholder',[ 'module'=>'Coupons' ]);
        $this->load->view('layouts/footer');
    }
}
