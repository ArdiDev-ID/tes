<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    public function index() {
        $data['title']='Admin Categories';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Categories' ]);
        $this->load->view('layouts/footer');
    }
}
