<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function login() {
        $data['title'] = 'Masuk - AkunMart';

        if ($this->input->method() === 'post') {
            $this->load->model('Auth_model');
            $identity = trim((string) $this->input->post('identity', true));
            $password = (string) $this->input->post('password');
            $user = $this->Auth_model->attemptLogin($identity, $password);

            if ($user) {
                $this->session->set_userdata('auth_user', $user);
                redirect('buyer/dashboard');
                return;
            }
            $data['error'] = 'Email/username atau password tidak valid.';
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('layouts/footer');
    }

    public function register() {
        $data['title'] = 'Daftar - AkunMart';

        if ($this->input->method() === 'post') {
            $this->load->model('Auth_model');
            $payload = [
                'name' => trim((string) $this->input->post('name', true)),
                'email' => trim((string) $this->input->post('email', true)),
                'phone' => trim((string) $this->input->post('phone', true)),
                'password' => (string) $this->input->post('password'),
            ];

            $result = $this->Auth_model->registerBuyer($payload);
            if ($result['ok']) {
                $this->session->set_flashdata('auth_success', 'Daftar berhasil. Silakan login.');
                redirect('login');
                return;
            }
            $data['error'] = $result['message'];
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('auth/register', $data);
        $this->load->view('layouts/footer');
    }

    public function logout() {
        $this->session->unset_userdata(['auth_user']);
        redirect('login');
    }
}
