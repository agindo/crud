<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Posisi');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function create()
	{
		$validator = array('success' => false, 'messages' => array());

		$config = array(
      array(
        'field' => 'nama_posisi',
        'label' => 'Nama Posisi',
        'rules' => 'trim|required'
      )
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
		if($this->form_validation->run() === true){
			$createPosisi = $this->Model_Posisi->create();
			if($createPosisi === true){
				$validator['success'] = true;
				$validator['messages'] = "Successfully added";
			}else{
				$validator['success'] = false;
				$validator['messages'] = "Error while updating the information";
			}
		}else{
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);
	}

}
