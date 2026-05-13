<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller { public function index(){ $data['title']='Order Seller'; $this->load->view('layouts/header',$data); $this->load->view('seller/orders'); $this->load->view('layouts/footer'); }}
