<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function index() {
        $data['title']='Seller Settings';
        $this->load->view('layouts/header',$data);
        $this->load->view('seller/placeholder',[ 'module'=>'Settings' ]);
        $this->load->view('layouts/footer');
    }
}
