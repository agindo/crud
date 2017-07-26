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

	public function fetchPosisiData()
	{
		$result = array('data'=>array());

		$data = $this->Model_Posisi->fetchPosisiData();
		$no=1;
		foreach ($data as $key => $value) {
			$nomor = '<center><small>'.$no.'</small></center>';
			$nama_posisi = '<small>'.$value['nama_posisi'].'</small>';
			$button = '<center>
									<div class="dropdown">
  									<button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Action
									    <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    <li><a href="#">Edit</a></li>
									    <li><a href="#">Delete</a></li>
									  </ul>
									</div>
								</center>';
			$result['data'][$key] = array(
				$nomor,
				$nama_posisi,
				$button
			);

			$no++;
		}

		echo json_encode($result);
	}

}
