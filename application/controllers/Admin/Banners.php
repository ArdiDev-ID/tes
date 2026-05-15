<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
    public function index() {
        $data['title']='Admin Banners';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Banners' ]);
        $this->load->view('layouts/footer');
    }
}
