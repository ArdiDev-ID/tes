<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function getOrderByNo($orderNo) {
        return $this->db->get_where('orders', ['order_no' => $orderNo])->row_array();
    }

    public function getOrderState($productId) {
        $key = 'order_safe_' . (int) $productId;
        $isSafe = (bool) $this->session->userdata($key);

        return [
            'order_no' => 'INV-' . date('ymd') . '-' . ((int) $productId ?: 1),
            'payment_method' => 'DANA',
            'is_safe' => $isSafe,
            'payment_status' => 'Lunas',
            'escrow_status' => $isSafe ? 'Dana Diteruskan ke Seller' : 'Dana Ditahan Escrow',
        ];
    }

    public function setSafetyConfirmation($productId, $isSafe) {
        $this->session->set_userdata('order_safe_' . (int) $productId, $isSafe ? 1 : 0);
        return true;
    }

    public function getBuyerPurchaseHistory($filters = []) {
        $rows = [
            ['order_no' => 'INV-240524-8X9F7A', 'title' => 'Mobile Legends Account', 'subtitle' => 'Mythic Glory · 75+ Skin', 'seller' => 'ProPlayerStore', 'date' => '24 Mei 2024', 'price' => 347500, 'status' => 'selesai'],
            ['order_no' => 'INV-240520-NF2X8B', 'title' => 'Netflix Premium Account', 'subtitle' => 'ULTRA HD · 4 Profile', 'seller' => 'StreamPro', 'date' => '20 Mei 2024', 'price' => 35000, 'status' => 'diproses'],
            ['order_no' => 'INV-240516-GI7Q2M', 'title' => 'Genshin Impact Account', 'subtitle' => 'AR 60 · Banyak 5★', 'seller' => 'GenshinStore', 'date' => '16 Mei 2024', 'price' => 450000, 'status' => 'dibatalkan'],
            ['order_no' => 'INV-240510-SP6D1K', 'title' => 'Spotify Premium Account', 'subtitle' => 'Family Plan · 12 Bulan', 'seller' => 'MusicID', 'date' => '10 Mei 2024', 'price' => 65000, 'status' => 'selesai'],
        ];

        $q = strtolower(trim(isset($filters['q']) ? $filters['q'] : ''));
        $status = isset($filters['status']) ? strtolower($filters['status']) : 'semua';

        $rows = array_values(array_filter($rows, function ($r) use ($q, $status) {
            $matchQ = $q === '' || strpos(strtolower($r['title'] . ' ' . $r['order_no']), $q) !== false;
            $matchS = $status === 'semua' || $r['status'] === $status;
            return $matchQ && $matchS;
        }));

        return $rows;
    }

    public function getBuyerPurchaseStats() {
        return ['total' => 28, 'selesai' => 20, 'diproses' => 5, 'dibatalkan' => 3];
    }
}
