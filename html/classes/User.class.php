<?php
require_once 'DB.class.php';

class User {

	public $id;
	public $username;
	public $hashedPassword;
	public $email;
	public $joinDate;

	function _construct ($data) {
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->username = (isset($data['username'])) ? $data['username'] : "";
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
	}

	public function save ($isnewuser = false) {
		$db = new DB();

		if (!isnewuser) {
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'"
			);

			$db->update($data, 'users', 'id = '.$this->id);
		} else {
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'",
				"join_date" => "'".date("Y-m-d H:i:s",time())."'"				
			);

			$db->insert($data, 'users');
		}
	}

}

?>