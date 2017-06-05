<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilterDashboard extends CI_Controller {

  // public function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('model_dashboard');
	// }

  // public function getDataKotaKab(){
	// 	$this->model_security->getsecurity();
	// 	$result = $this->model_dashboard->getDataKotaKab();
	// 	return $result;
	// }

  public function KotaKab(){
		$this->model_security->getsecurity();
    $isikonten['content'] = 'home/filterkotakab'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    $isikonten['menu'] = 'HOME';
    $isikonten['sub_judul'] = 'DASHBOARD'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
    $this->load->view('body', $isikonten);

    // $result = $this->model_dashboard->getDataKotaKab();
		// return $result;
	}

  // public function getDataPendidikan(){
	// 	$this->model_security->getsecurity();
	// 	$result = $this->model_dashboard->getDataPendidikan();
	// 	return $result;
	// }
  //
  // public function getDataUsia(){
	// 	$this->model_security->getsecurity();
	// 	$result = $this->model_dashboard->getDataUsia();
	// 	return $result;
	// }
  //
  // public function getDataJenkel(){
	// 	$this->model_security->getsecurity();
	// 	$result = $this->model_dashboard->getDataJenkel();
	// 	return $result;
	// }


}
