<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller { public function index(){ $data['title']='Produk Seller'; $this->load->view('layouts/header',$data); $this->load->view('seller/products'); $this->load->view('layouts/footer'); }}
