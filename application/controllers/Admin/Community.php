<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends CI_Controller {
    public function index() {
        $data['title']='Admin Community';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Community' ]);
        $this->load->view('layouts/footer');
    }
}
