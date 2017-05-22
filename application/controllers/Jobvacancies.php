<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobvacancies extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_jobVacancies');
	}

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'jobvacancies/jobvacancies'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'Job Vacancies';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}

	public function getData(){
		$this->model_security->getsecurity();
		$result = $this->model_jobVacancies->getData();
		echo json_encode($result);
	}


}
