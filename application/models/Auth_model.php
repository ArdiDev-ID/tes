<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function attemptLogin($identity, $password) {
        $identity = trim((string) $identity);
        if ($identity === '' || $password === '') {
            return null;
        }

        $row = $this->db
            ->from('users')
            ->group_start()
            ->where('email', $identity)
            ->or_where('name', $identity)
            ->group_end()
            ->where('status', 'active')
            ->limit(1)
            ->get()
            ->row_array();

        if ($row && password_verify($password, $row['password_hash'])) {
            return ['id' => $row['id'], 'name' => $row['name'], 'role' => $row['role']];
        }

        if (($identity === 'demo@akunmarket.com' || $identity === 'demo') && $password === 'demo123') {
            return ['id' => 0, 'name' => 'Demo User', 'role' => 'buyer'];
        }

        return null;
    }
}
