<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function status($mode = 'process', $productId = null) {
        $this->load->model('Product_model');
        $this->load->model('Order_model');

        $product = $productId ? $this->Product_model->getProductDetail((int) $productId) : null;
        if (!$product) {
            $product = $this->Product_model->getFallbackProduct();
        }

        $orderState = $this->Order_model->getOrderState((int) $product['id']);
        $titleMap = ['process' => 'Pesanan Diproses', 'success' => 'Pembayaran Selesai'];

        $data = [
            'title' => ($titleMap[$mode] ?? 'Status Pesanan') . ' - AkunMarket',
            'mode' => $mode,
            'product' => $product,
            'order' => $orderState,
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('order_status', $data);
        $this->load->view('layouts/footer');
    }

    public function confirm_safety($productId = 0) {
        $isSafe = $this->input->post('is_safe') === '1';
        $this->load->model('Order_model');
        $this->Order_model->setSafetyConfirmation((int) $productId, $isSafe);
        redirect('order/status/success/' . (int) $productId);
    }
}
