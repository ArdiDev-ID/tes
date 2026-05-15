<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
    public function index() {
        $data['title']='User Wishlist';
        $this->load->view('layouts/header',$data);
        $this->load->view('user/placeholder',[ 'module'=>'Wishlist' ]);
        $this->load->view('layouts/footer');
    }
}
