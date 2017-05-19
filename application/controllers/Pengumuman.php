<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'pengumuman/pengumuman'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'PENGUMUMAN';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}


}
