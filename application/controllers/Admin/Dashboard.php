<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller { public function index(){ $data['title']='Admin Dashboard'; $this->load->view('layouts/header',$data); $this->load->view('admin/dashboard'); $this->load->view('layouts/footer'); }}
