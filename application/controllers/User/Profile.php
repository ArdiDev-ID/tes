<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function index() {
        $data['title']='User Profile';
        $this->load->view('layouts/header',$data);
        $this->load->view('user/placeholder',[ 'module'=>'Profile' ]);
        $this->load->view('layouts/footer');
    }
}
