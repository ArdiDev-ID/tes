<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet_model extends CI_Model {
    public function getWallet($userId) {
        return $this->db->get_where('user_wallets', ['user_id' => $userId])->row_array();
    }

    public function safeDebit($userId, $amount, $refType, $refId) {
        $this->db->trans_start();
        $row = $this->db->query('SELECT * FROM user_wallets WHERE user_id = ? FOR UPDATE', [$userId])->row_array();
        if (!$row || (float)$row['balance'] < (float)$amount) {
            $this->db->trans_rollback();
            return false;
        }
        $after = (float)$row['balance'] - (float)$amount;
        $this->db->where('user_id', $userId)->update('user_wallets', ['balance' => $after]);
        $this->db->insert('wallet_transactions', [
            'user_id' => $userId,
            'type' => 'debit',
            'amount' => $amount,
            'balance_before' => $row['balance'],
            'balance_after' => $after,
            'ref_type' => $refType,
            'ref_id' => $refId
        ]);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
