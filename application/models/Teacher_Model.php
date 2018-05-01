<?php


class Teacher_Model extends CI_Model {

	public function register_teacher($data){
		$this->db->insert('teacher', $data);
	}

	public function check_login($data){
		$result = $this->db->get_where('teacher', $data);
		return $result->num_rows();
	}


}