<?php

/**
 * 
 */
class Database
{
	
	public $link;
	
	/***
	* Function construct
	* This is the first function is called, when class Database is used
	* This function initiate the connection to database and setting character endcoding to utf8
	* That mean we can use Vietnamese laguage in database
	*/
	public function __construct()
	{
		$this->link = mysqli_connect("localhost", "root", "", "cosmetic") or die();
		mysqli_set_charset($this->link, "utf8");
	}



	/**
	* [insert description] Insert function
	* @param $table
	* @param array $data
	* @return integer
	* Insert some record to database
	*/
	public function insert($table, array $data)
	{
		$sql = "INSERT INTO {$table}";
		# implode is function convert array to string with a delimiter 
		$columns = implode(',', array_keys($data));
		$values = "";
		$sql .= '(' . $columns . ')';
		foreach ($data as $field => $value) {
			if(is_string($value)){
				#The String will escaped characters encoded are NUL, \0, \n, \r, \, ', ", and Control-Z
				$values .= "'". mysqli_real_escape_string($this->link, $value) ."',";
			}else{
				$values .= mysqli_real_escape_string($this->link, $value) .',';
			}
		}	
		# substr will remove last character
		$values = substr($values, 0, -1);
		$sql .= " VALUES (" . $values .')';
		mysql_query($this->link, $sql) or die("Insert error:" .mysqli_error($this->link));
		return mysqli_insert_id($this->link);
	}


	/**
	* [update description] Update funtion
	* @param $table
	* @param array $data
	* @param array $conditions 
	* @return 
	*/
	public function update($table, array $data, array $conditions)
	{
		$sql = "UPDATE {$table}";

		$set = " SET ";

		$where = " WHERE ";

		foreach ($data as $field => $value) {
			if(is_string($value)){
				$set .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\',';
			}else{
				$set .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
			}
		}

		$set = substr($set, 0, -1);

		foreach ($conditions as $key => $value) {
			if(is_string($value)){
				$where .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\' AND ';
			}else{
				$where .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) .' AND ';
			}
		}
		$where = substr($where, 0, -5);

		$sql .= $set . $where;

		mysqli_query($this->link, $sql) or die("Update error: " .mysqli_error());

		return mysqli_affected_rows($this->link);
	}


	/**
	*	[function fetchAll]
	* 	@param $table
	* 	@return All data in table
	*/
	public function fetchAll($table)
	{
		$sql = "SELECT * FROM {$table} WHERE 1";
		$result = mysqli_query($this->link, $sql) or die("Fetch All error: " .mysqli_error($this->link));
		$data = [];
		if( $result )
		{
			while ($num = mysqli_fetch_assoc($result)) {
				$data[] = $num;
			}
		}
		return $data;
	}
}

