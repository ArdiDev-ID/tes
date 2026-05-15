<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function detail($id = null) {
        $this->load->model('Product_model');

        $product = $id ? $this->Product_model->getProductDetail((int) $id) : null;
        if (!$product) {
            $product = $this->Product_model->getFallbackProduct();
        }

        $data['title'] = $product['title'] . ' - AkunMarket';
        $data['product'] = $product;
        $data['related_products'] = $this->Product_model->getRelatedProducts((int) $product['id'], (int) $product['category_id'], 3);

        $this->load->view('layouts/header', $data);
        $this->load->view('product_detail', $data);
        $this->load->view('layouts/footer');
    }
}
