<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {
    public function index() {
        $data['title']='Admin Transactions';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Transactions' ]);
        $this->load->view('layouts/footer');
    }
}
