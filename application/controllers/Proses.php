<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_proses');
	}

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'laporan/pelamar/proses'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'Laporan Proses';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}

	public function getData(){
		
		$this->model_security->getsecurity();
		$result = $this->model_proses->getData();
		 
 		echo json_encode($result);
	}

	public function getIdPelamar(){
	 $this->model_security->getsecurity();
	 $id = $this->input->post('id_user');
	 $result = $this->model_proses->getIdPelamar($id);
	 echo json_encode($result);
 }

	public function lulus(){
		$this->model_security->getsecurity();
		$id = $this->input->post('id');
		$result = $this->model_proses->lulusData();
		echo json_encode($result);
   }


}
