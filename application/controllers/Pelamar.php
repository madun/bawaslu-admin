<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_pelamar');
	}

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'laporan/pelamar/pelamar'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'Laporan Pelamar';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}

	public function getData(){

		
		$this->model_security->getsecurity();
		$result = $this->model_pelamar->getData();
		 
 		echo json_encode($result);
		
	}

	public function getIdPelamar(){
	 $this->model_security->getsecurity();

	 $id = $this->input->post('id_user');
	 $result = $this->model_pelamar->getIdPelamar($id);
	 echo json_encode($result);
 }

	// public function insertData(){
	// 	// echo var_dump($_FILES);
	// 	$this->model_security->getsecurity();
	// 	// $result = $this->model_pelamar->insertData();
	// 	echo json_encode($result);
	// 	// return $result;
  //  }


}
