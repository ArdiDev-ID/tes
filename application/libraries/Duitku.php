<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Duitku {
    protected $ci;
    public function __construct() { $this->ci =& get_instance(); }

    public function createInvoicePayload($orderNo, $amount, $email) {
        return [
            'merchantOrderId' => $orderNo,
            'paymentAmount' => $amount,
            'email' => $email,
            'productDetails' => 'Pembelian akun',
        ];
    }
}
