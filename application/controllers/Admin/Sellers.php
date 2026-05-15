<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellers extends CI_Controller {
    public function index() {
        $data['title']='Admin Sellers';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Sellers' ]);
        $this->load->view('layouts/footer');
    }
}
