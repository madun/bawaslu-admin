<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success_login extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'home/home'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'HOME';
		$isikonten['sub_judul'] = 'DASHBOARD'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}

	public function logout(){
			$this->load->model('model_login');
			$data = '';
			// $this->model_login->status_login($data); // edit status login = 0
			$this->session->sess_destroy();
			redirect('login');
	}


}
