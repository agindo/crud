<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Posisi extends CI_Model {

	public function create(){
		$this->db->select_max('id');
		$query  = $this->db->get('posisi');
		$result = $query->row()->id;
		$data = array('id'=>$result+1, 'nama_posisi'=>$this->input->post('nama_posisi'));

		$sql = $this->db->insert('posisi',$data);

		if($sql === true){
			return true;
		}else{
			return false;
		}
	}	

}