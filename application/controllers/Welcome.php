<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// Shows dashboard
	public function dashboard() {
		$query = $this->db->query("select `runs`.`id`, `runs`.`runner`, `runs`.`status`,`problems`.`title` from `runs` INNER JOIN `problems` on `runs`.`problemid`=`problems`.`id`");
		$this->load->view('dashboard.php', [
			'runs' => $query
		]);
	}


	// Shows add form
	public function add() {
		$this->load->view('add.php', [

		]);
	}

	// shows list of problems
	public function index() {
		$query = $this->db->query("select * from `problems`");
		$this->load->view('problems.php', [
			'problems' => $query
		]);
	}

	// shows details of a specific problem and lets the user solve it
	public function problem($id) {
		$query   = $this->db->query("select * from problems where id='$id'");
		$problem = $query->result_array()[0];

		$this->load->view('problem.php', [
			'id'            => $id,
			'problem'       => $problem,
			'student_email' => $this->session->userdata()['student_email']
		]);
	}

	// show result of a specific run
	public function runs($id) {

		$result = $this->db->query("select * from runs where id='$id'");
		$run    = $result->result_array()[0];

		$css = ($run['status'] != "Accepted") ? "color:#d32f2f" : "color:#66BB6A";

		$this->load->view('runs.php', [
			'run' => $run,
			'css' => $css
		]);

	}


	// adds a problem to the database
	public function add_do() {
		$values = [];

		// Sanitize Values
		foreach ($_POST as $key => $value)
//			$values[$key] = $value;
			$values[$key] = mysqli_real_escape_string(get_instance()->db->conn_id, $value);

		$query = "insert into `problems` (`";
		$query .= join("`,`", array_keys($values)) . "`) Values('";
		$query .= join("','", array_values($values)) . "')";

		$this->db->query($query);
		header('location:/teacher/dashboard');
	}

	// evaluate if code is correct or not
	public function solve_do() {

		$this->load->model('helper');

		$language_codes = [
			'java'  => 'java',
			'c_cpp' => 'cpp',
		];

		$code_dir  = __DIR__ . "/../../code/";
		$input_loc = $code_dir . 'input.in';

		// generate filename using solver name and timestamp
		$file_name_no_ext = $_POST['solver'] . time();
		// attach file extension to the filename
		$file_name = $file_name_no_ext . "." . $language_codes[$_POST['language']];
		// concat code folder and filename to get file location
		$file_loc = $code_dir . $file_name;


		// open the code file in write mode
		$file = fopen($file_loc, 'w');
		// write the code into the file
		fwrite($file, $_POST['code']);

		// get problem id from POST variable
		$problemId = $_POST['problemid'];
		// fetch details about the problem from database
		$problem = $this->db->query("select * from problems where id='$problemId'")->result_array()[0];

		// open input file
		$file = fopen($input_loc, 'w');
		// write input set from database into input file
		fwrite($file, $problem['testin']);


		// compile code according to the language
		if ($_POST['language'] == 'java') {
			exec("javac $file_loc 2>&1", $compile_output, $compile_error);
		} else {
			exec("g++ $file_loc -o $code_dir" . $file_name_no_ext . " 2>&1", $compile_output, $compile_error);
		}

		// If program fails to compile save run details into database and redirect
		if ($compile_error) {
			$runId = $this->helper->record_run($_POST['solver'], $problemId, 'Compilation Error', PHP_EOL . implode(PHP_EOL, $compile_output), $_POST['code']);
			unlink($code_dir . "Solution.class");
			unlink("$file_loc");
			unlink("$file_name_no_ext");
			header('location: /runs/' . $runId);
			die();
		}

		// run the generated file
		if ($_POST['language'] == 'java') {
			exec("java -cp $code_dir Solution < $input_loc 2>&1", $execution_output, $execution_error);
		} else {
			exec("./../code/$file_name_no_ext < $input_loc 2>&1", $execution_output, $execution_error);
		}

		// If program fails to execute save run details into database and redirect
		if ($execution_error) {
			$runId = $this->helper->record_run($_POST['solver'], $problemId, 'Execution Error', PHP_EOL . implode(PHP_EOL, $execution_output), $_POST['code']);
			unlink($code_dir . "Solution.class");
			unlink("$file_loc");
			unlink("$file_name_no_ext");
			header('location: /runs/' . $runId);
			die();
		}

		// if no errors are thrown, save the output into one string variable
		$output = PHP_EOL . implode(PHP_EOL, $execution_output);

		// check if output from user's code matches the expected output in the database
		if (trim($output) == trim($problem['testout'])) {
			// if answer is correct, save appropriate details and redirect
			$runId = $this->helper->record_run($_POST['solver'], $problemId, 'Accepted', '', $_POST['code']);
			unlink($code_dir . "Solution.class");
			unlink("$file_loc");
			unlink("$file_name_no_ext");
			header('location: /runs/' . $runId);
			die();
		} else {
			// if answer is incorrect, save appropriate details and redirect
			$runId = $this->helper->record_run($_POST['solver'], $problemId, 'Answer Incorrect', '', $_POST['code']);
			unlink($code_dir . "Solution.class");
			unlink("$file_loc");
			unlink("$file_name_no_ext");
			header('location: /runs/' . $runId);
			die();
		}
	}

	public function test() {
		$this->load->view('login.php', [

		]);
	}
}
