<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {
    public function index() {
        $data['title']='Admin Logs';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Logs' ]);
        $this->load->view('layouts/footer');
    }
}
