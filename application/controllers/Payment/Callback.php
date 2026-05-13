<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {
    public function duitku() {
        $payload = file_get_contents('php://input');
        log_message('info', 'Duitku callback: '.$payload);
        $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'OK']));
    }
}
