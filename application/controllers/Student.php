<?php

/**
 * Created by PhpStorm.
 * User: shuvojit
 * Date: 1/5/18
 * Time: 1:46 PM
 */
class Student extends CI_Controller{

	public function login_form() {
		$data = [];
		if($this->session->flashdata('fail'))
			$data['fail'] = 'Email-password wrong';
		$this->load->view('login_student.php', $data);
	}

	public function register_do() {
		$this->Student_Model->register_student($_POST);

		return redirect('/student/dashboard');
	}

	public function login_do() {
		if ($this->Student_Model->check_login($_POST)) {
			$this->session->set_userdata('student_email', $_POST['email']);
			redirect('student/dashboard');
		} else {
			$this->session->set_flashdata('fail', true);
			redirect("/student/login");
		}
	}

	public function problems(){
		$teacher_email = $this->session->userdata()['teacher_email'];

		$query = $this->db->query("select * from `problems` inner join `teacher` on `problems`.`creator` = `teacher`.`email`");
		$this->load->view('problems.php', [
			'problems' => $query
		]);
	}

	public function dashboard(){
		$student_email = $this->session->userdata()['student_email'];
		$query = $this->db->query("select `runs`.`id`, `runs`.`runner`, `runs`.`status`,`problems`.`title` from `runs` INNER JOIN `problems` on `runs`.`problemid`=`problems`.`id` WHERE `runs`.`runner`='$student_email'");
		$this->load->view('dashboard.php', [
			'runs' => $query
		]);
	}

}