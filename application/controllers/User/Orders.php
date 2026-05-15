<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    public function index() {
        $data['title']='User Orders';
        $this->load->view('layouts/header',$data);
        $this->load->view('user/placeholder',[ 'module'=>'Orders' ]);
        $this->load->view('layouts/footer');
    }
}
