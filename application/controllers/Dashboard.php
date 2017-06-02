<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('model_dashboard');
	}

  public function getDataKotaKab(){
		$this->model_security->getsecurity();
		$result = $this->model_dashboard->getDataKotaKab();
		return $result;
	}

  public function getDataPendidikan(){
		$this->model_security->getsecurity();
		$result = $this->model_dashboard->getDataPendidikan();
		return $result;
	}


}
