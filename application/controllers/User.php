<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_user');
	}

	public function index()
	{
		$this->model_security->getsecurity();
		$isikonten['content'] = 'user/user'; // content harus sama dengan yang ada di tampilan_home $content (agar dinamis)
    // breadcrumb
    $isikonten['judul'] = 'Bawaslu'; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
		$isikonten['menu'] = 'USER';
		$isikonten['sub_judul'] = ''; //untuk $judul dan $sub_judul yg ada di tampilan_home.php (breadcrumb)
    // breadcrumb
		$this->load->view('body', $isikonten);
	}

	public function getData(){
		$this->model_security->getsecurity();
		$result = $this->model_user->getData();
		echo json_encode($result);
	}

	public function insertData(){
		$this->model_security->getsecurity();
		$result = $this->model_user->insertData();
		echo json_encode($result);
	}

	public function getidUser(){
		$this->model_security->getsecurity();

		$id = $this->input->post('id_user');
		$result = $this->model_user->getid_edit($id);
		echo json_encode($result);
	}

	public function updateData(){
		$this->model_security->getsecurity();
		$result = $this->model_user->updateData();
		echo json_encode($result);
	}

	public function deleteData(){
		$this->model_security->getsecurity();
		$result = $this->model_user->deleteData();
		echo json_encode($result);
	}


}
