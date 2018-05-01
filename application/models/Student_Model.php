<?php


class Student_Model extends CI_Model {

	public function register_student($data){
		$this->db->insert('student', $data);
	}

	public function check_login($data){
		$result = $this->db->get_where('student', $data);
		return $result->num_rows();
	}


}