<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    public function getActiveCategories($limit = 6) {
        return $this->db
            ->select('id, name')
            ->from('categories')
            ->where('is_active', 1)
            ->order_by('name', 'ASC')
            ->limit((int) $limit)
            ->get()
            ->result_array();
    }
}
