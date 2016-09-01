<?php

class DB {

	protected $db_name = 'DebtOverview';
	protected $db_user = 'debtorServer';
	protected $db_pass = 'potato';
	protected $db_host = 'localhost';

	public function connect() {
		$connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
		mysql_select_db($this->db_name);

		return true;
	}

	public function insert($data, $table) {

		$columns = "";
		$values = "";

		foreach ($data as $column => $value) {
			$columns .= ($columns == "") ? "" : ", ";
			$columns .= $column;
			$values .= ($values == "") ? "" : ", ";
			$values .= $value;
		}

		$sql = "INSERT INTO $table ($columns) VALUES ($values)";

		mysql_query($sql) or die(mysql_error());

		return mysql_insert_id();
	}

	public function delete ($table, $where) {

		$sql = "DELETE FROM $table WHERE $where";
		
		mysql_query($sql);

		return true;	
	}

	public function update($data, $table, $where) {
		foreach ($data as $column => $value) {
			$sql = "UPDATE $table SET $column = $value WHERE $where";
			mysql_query($sql) or die(mysql_error());
		}
		return true;
	}

	public function selectUsers() {
		$sql = "SELECT id, username, email FROM users";
		$result = mysql_query($sql);

		return $result;
	}
}

?>