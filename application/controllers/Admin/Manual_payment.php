<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual_payment extends CI_Controller {
    public function index() {
        $data['title']='Admin Manual_payment';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Manual_payment' ]);
        $this->load->view('layouts/footer');
    }
}
