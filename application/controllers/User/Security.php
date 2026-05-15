<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {
    public function index() {
        $data['title']='User Security';
        $this->load->view('layouts/header',$data);
        $this->load->view('user/placeholder',[ 'module'=>'Security' ]);
        $this->load->view('layouts/footer');
    }
}
