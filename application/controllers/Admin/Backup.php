<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {
    public function index() {
        $data['title']='Admin Backup';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Backup' ]);
        $this->load->view('layouts/footer');
    }
}
