<?php

/**
 * Created by PhpStorm.
 * User: shuvojit
 * Date: 1/5/18
 * Time: 1:46 PM
 */
class Student extends CI_Controller{
	// show student login form
	public function login_form() {
		$data = [];
		if($this->session->flashdata('fail'))
			$data['fail'] = $this->session->flashdata('message');
		$this->load->view('login_student.php', $data);
	}

	// check if any student with the same email exists else registers new student
	public function register_do() {

		if($this->Student_Model->is_registered($_POST['email'])){
			$this->session->set_flashdata('fail', true);
			$this->session->set_flashdata('message', 'Email and password do not match');
			redirect("/student/login");
		}

		$this->Student_Model->register_student($_POST);

		return redirect('/student/dashboard');
	}


	// check login and redirect accordingly
	public function login_do() {
		if ($this->Student_Model->check_login($_POST)) {
			$this->session->set_userdata('student_email', $_POST['email']);
			redirect('student/dashboard');
		} else {
			$this->session->set_flashdata('fail', true);
			$this->session->set_flashdata('message', 'Email and password do not match');
			redirect("/student/login");
		}
	}

	// show list of problems
	public function problems(){
		$teacher_email = $this->session->userdata()['teacher_email'];

		$query = $this->db->query("select `problems`.`id`, `problems`.`title`, `problems`.`difficulty`, `teacher`.`name` from `problems` inner join `teacher` on `problems`.`creator` = `teacher`.`email`");
		$this->load->view('problems.php', [
			'problems' => $query
		]);
	}

	// show dashboard with list of runs
	public function dashboard(){
		$student_email = $this->session->userdata()['student_email'];
		$query = $this->db->query("select `runs`.`id`, `runs`.`runner`, `runs`.`status`,`problems`.`title` from `runs` INNER JOIN `problems` on `runs`.`problemid`=`problems`.`id` WHERE `runs`.`runner`='$student_email'");
		$this->load->view('dashboard.php', [
			'runs' => $query
		]);
	}

}