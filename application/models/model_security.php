<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_security extends CI_Model {

    public function getsecurity(){ // function login squrity

        $username = $this->session->userdata('user');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('login');
        }

    }

}
