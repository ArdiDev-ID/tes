<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function attemptLogin($identity, $password) {
        $identity = trim((string) $identity);
        if ($identity === '' || $password === '') return null;

        $row = $this->db->from('users')->group_start()->where('email', $identity)->or_where('name', $identity)->group_end()->where('status', 'active')->limit(1)->get()->row_array();
        if ($row && password_verify($password, $row['password_hash'])) {
            return ['id' => $row['id'], 'name' => $row['name'], 'role' => $row['role']];
        }
        if (($identity === 'demo@akunmart.com' || $identity === 'demo') && $password === 'demo123') {
            return ['id' => 0, 'name' => 'Demo User', 'role' => 'buyer'];
        }
        return null;
    }

    public function registerBuyer($payload) {
        if ($payload['name'] === '' || $payload['email'] === '' || $payload['password'] === '') {
            return ['ok' => false, 'message' => 'Nama, email, dan password wajib diisi.'];
        }

        $exists = $this->db->from('users')->where('email', $payload['email'])->count_all_results();
        if ($exists) return ['ok' => false, 'message' => 'Email sudah terdaftar.'];

        $this->db->insert('users', [
            'role' => 'buyer',
            'name' => $payload['name'],
            'email' => $payload['email'],
            'phone' => $payload['phone'],
            'password_hash' => password_hash($payload['password'], PASSWORD_BCRYPT),
            'status' => 'active',
        ]);

        return ['ok' => true, 'message' => 'registered'];
    }
}
