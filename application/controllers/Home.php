<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
        $this->load->model('Category_model');
        $this->load->model('Product_model');

        $data['title'] = 'Marketplace Jual Beli Akun';
        $data['categories'] = $this->Category_model->getActiveCategories(6);
        $data['products'] = $this->Product_model->getPopularProducts(10);

        $this->load->view('layouts/header', $data);
        $this->load->view('home', $data);
        $this->load->view('layouts/footer');
    }
}
