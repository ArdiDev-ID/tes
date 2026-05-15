<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {
    public function index() {
        $data['title']='Admin Withdraw';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Withdraw' ]);
        $this->load->view('layouts/footer');
    }
}
