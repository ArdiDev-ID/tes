<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function index() {
        $data['title']='Admin Users';
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/placeholder',[ 'module'=>'Users' ]);
        $this->load->view('layouts/footer');
    }
}
