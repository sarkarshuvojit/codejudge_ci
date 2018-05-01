<?php

/**
 * Created by PhpStorm.
 * User: shuvojit
 * Date: 21/4/18
 * Time: 9:30 AM
 */
class Helper extends CI_Model {
	public function record_run($runner, $problemid, $status, $error, $code){

		$runner = mysqli_real_escape_string(get_instance()->db->conn_id, $runner);
		$problemid = mysqli_real_escape_string(get_instance()->db->conn_id, $problemid);
		$status = mysqli_real_escape_string(get_instance()->db->conn_id, $status);
		$error = mysqli_real_escape_string(get_instance()->db->conn_id, $error);
		$code = mysqli_real_escape_string(get_instance()->db->conn_id, $code);
		
		$this->db->query("insert into `runs`(`runner`, `problemid`, `status`, `error`, `code`) values('$runner', '$problemid', '$status', '$error', '$code')");
		return $this->db->insert_id();
	}
}