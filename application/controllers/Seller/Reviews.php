<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {
    public function index() {
        $data['title']='Seller Reviews';
        $this->load->view('layouts/header',$data);
        $this->load->view('seller/placeholder',[ 'module'=>'Reviews' ]);
        $this->load->view('layouts/footer');
    }
}
