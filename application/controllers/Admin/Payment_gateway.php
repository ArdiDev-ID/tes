<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_gateway extends CI_Controller {
    public function index() {
        $data['title']='Admin Payment_gateway';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Payment_gateway' ]);
        $this->load->view('layouts/footer');
    }
}
