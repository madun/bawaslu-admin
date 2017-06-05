<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_pelamar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_detailPelamar');
	}

	public function getData(){
		$this->model_security->getsecurity();
		$isikonten['content'] = 'laporan/pelamar/detail_pelamar'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'Detial Pelamar';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$isikonten['data'] = $this->model_detailPelamar->getData();
		$this->load->view('body', $isikonten);
		// $result = $this->model_detailPelamar->getData();
		// echo json_encode($result);
	}


}
