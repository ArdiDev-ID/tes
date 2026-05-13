<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function login() {
        $data['title'] = 'Masuk - AkunMarket';

        if ($this->input->method() === 'post') {
            $this->load->model('Auth_model');
            $identity = trim((string) $this->input->post('identity', true));
            $password = (string) $this->input->post('password');
            $remember = $this->input->post('remember') === '1';

            $user = $this->Auth_model->attemptLogin($identity, $password);
            if ($user) {
                $this->session->set_userdata('auth_user', $user);
                if ($remember) {
                    $this->session->set_userdata('remember_me', 1);
                }
                redirect('buyer/dashboard');
                return;
            }

            $data['error'] = 'Email/username atau password tidak valid.';
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('layouts/footer');
    }

    public function logout() {
        $this->session->unset_userdata(['auth_user', 'remember_me']);
        redirect('login');
    }
}
