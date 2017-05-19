<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ldashboard extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'laporan/dashboard/dashboard'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'Laporan Pelamar';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}


}
