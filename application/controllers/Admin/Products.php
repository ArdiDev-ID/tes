<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller { public function review(){ $data['title']='Review Produk'; $this->load->view('layouts/header',$data); $this->load->view('admin/products_review'); $this->load->view('layouts/footer'); }}
