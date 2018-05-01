<?php

/**
 * Created by PhpStorm.
 * User: shuvojit
 * Date: 1/5/18
 * Time: 12:45 PM
 */
class Teacher extends CI_Controller {

	public function login_form() {
		$data = [];
		if($this->session->flashdata('fail'))
			$data['fail'] = 'Email-password wrong';
		$this->load->view('login.php', $data);
	}

	public function register_do() {
		$this->Teacher_Model->register_teacher($_POST);

		return redirect('/teacher/dashboard');
	}

	public function login_do() {
		if ($this->Teacher_Model->check_login($_POST)) {
			$this->session->set_userdata('teacher_email', $_POST['email']);
			redirect('teacher/dashboard');
		} else {
			$this->session->set_flashdata('fail', true);
			redirect("/teacher/login");
		}
	}

	public function dashboard(){
		$teacher_email = $this->session->userdata()['teacher_email'];

		$this->load->view('add.php', [
			'teacher_email' => $teacher_email
		]);
	}


}