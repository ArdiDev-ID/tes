<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function getPopularProducts($limit = 10) {
        return $this->db
            ->select('p.id, p.title, p.price, p.category_id, c.name AS category_name')
            ->from('products p')
            ->join('categories c', 'c.id = p.category_id', 'left')
            ->where('p.approval_status', 'approved')
            ->where('p.is_active', 1)
            ->order_by('p.created_at', 'DESC')
            ->limit((int) $limit)
            ->get()
            ->result_array();
    }

    public function getProductDetail($id) {
        return $this->db
            ->select('p.id, p.title, p.description, p.price, p.category_id, c.name AS category_name')
            ->from('products p')
            ->join('categories c', 'c.id = p.category_id', 'left')
            ->where('p.id', (int) $id)
            ->where('p.approval_status', 'approved')
            ->where('p.is_active', 1)
            ->get()
            ->row_array();
    }

    public function getRelatedProducts($excludeId, $categoryId, $limit = 3) {
        $items = $this->db
            ->select('p.id, p.title, p.price, c.name AS category_name')
            ->from('products p')
            ->join('categories c', 'c.id = p.category_id', 'left')
            ->where('p.approval_status', 'approved')
            ->where('p.is_active', 1)
            ->where('p.category_id', (int) $categoryId)
            ->where('p.id !=', (int) $excludeId)
            ->order_by('p.created_at', 'DESC')
            ->limit((int) $limit)
            ->get()
            ->result_array();

        if (!empty($items)) {
            return $items;
        }

        return [
            ['id' => 0, 'title' => 'Genshin Impact Account', 'price' => 160000, 'category_name' => 'Game'],
            ['id' => 0, 'title' => 'PUBG Mobile Account', 'price' => 120000, 'category_name' => 'Game'],
            ['id' => 0, 'title' => 'Free Fire MAX Account', 'price' => 90000, 'category_name' => 'Game'],
        ];
    }

    public function getFallbackProduct() {
        return [
            'id' => 0,
            'title' => 'Mobile Legends Account',
            'description' => 'Akun siap pakai dengan rank tinggi, skin lengkap, dan akses aman.',
            'price' => 350000,
            'category_id' => 0,
            'category_name' => 'Game',
        ];
    }
}
