<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function index() {
        $data['title']='Admin Reports';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Reports' ]);
        $this->load->view('layouts/footer');
    }
}
