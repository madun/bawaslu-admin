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

	public function getDataKab(){
		$this->model_security->getsecurity();
    $result = $this->model_jobVacancies->getDataKab();
    echo json_encode($result);
	}

	public function getData(){
		$this->model_security->getsecurity();
		$result = $this->model_jobVacancies->getData();
		echo json_encode($result);
	}

	public function insertData(){
		// echo var_dump($_FILES);
		$this->model_security->getsecurity();
		$result = $this->model_jobVacancies->insertData();
		echo json_encode($result);
		// return $result;
   }

	 public function getIdJobvacancies(){
 		$this->model_security->getsecurity();

 		$id = $this->input->post('id_job_vacancy');
 		$result = $this->model_jobVacancies->getIdJobvacancies($id);
 		echo json_encode($result);
 	}

	// public function updateData(){
	// 	$this->model_security->getsecurity();
	// 	$result = $this->model_jobVacancies->updateData();
	// 	echo json_encode($result);
	// }

	public function deleteData(){
		$this->model_security->getsecurity();
		$result = $this->model_jobVacancies->deleteData();
		echo json_encode($result);
	}


}
