<?php

/**
 * Created by PhpStorm.
 * User: shuvojit
 * Date: 1/5/18
 * Time: 12:45 PM
 */
class Teacher extends CI_Controller {

	// Shows the login forn
	public function login_form() {
		$data = [];
		if($this->session->flashdata('fail'))
			$data['fail'] = $this->session->flashdata('message');
		$this->load->view('login.php', $data);
	}

	// checks if that email is registered already, else register new teacher
	public function register_do() {

		if($this->Teacher_Model->is_registered($_POST['email'])){
			$this->session->set_flashdata('fail', true);
			$this->session->set_flashdata('message', "Email already in use");
			redirect("/teacher/login");
		}

		$this->Teacher_Model->register_teacher($_POST);

		return redirect('/teacher/dashboard');
	}

	// check login and redirect accordingly
	public function login_do() {
		if ($this->Teacher_Model->check_login($_POST)) {
			$this->session->set_userdata('teacher_email', $_POST['email']);
			redirect('teacher/dashboard');
		} else {
			$this->session->set_flashdata('fail', true);
			$this->session->set_flashdata('message', "Email and password do not match");
			redirect("/teacher/login");
		}
	}

	// show the form where teacher can add problems
	public function dashboard(){
		$teacher_email = $this->session->userdata()['teacher_email'];

		$this->load->view('add.php', [
			'teacher_email' => $teacher_email
		]);
	}


}