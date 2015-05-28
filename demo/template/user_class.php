<?php
	class User {
		public $name = '';
		public $mobile = '';
		public $pass = '';
		public $email = '';
		public $address = '';
		public $designation = '';
		public $intro = '';
		public $dob = '';
		public $company = '';
		public $id = '';
		public $other = '';
		public $status = '';

		public function __construct() {
			$this->name = 'Anonyms';
			$this->mobile = '0000000000';
			$this->email = 'example@example.com';
			$this->pass = '123';
			$this->address = 'Anonyms';
			$this->designation = 'Anonyms';
			$this->intro = 'Anonyms';
			$this->dob = '0000-00-00';
			$this->company = 'Anonyms';
			$this->id = '0';
			$this->other = 'Anonyms';
			$this->status = 'user';
	    }
		
		public function add_to_db() {
			// echo 'hi welcome to db add';
			// print_r($this->name);
			try {
				$conn = mysql_connect("localhost", "root", "")or die('connection failed to db'); // Establishing conn with Server..
				$db = mysql_select_db("comm", $conn) or die('not connected to db'); // Selecting Database
				
				$sql = "INSERT INTO user SET name = '".$this->name."', mobile = '".$this->mobile."', email = '".$this->email."', pass = '".$this->pass."', address = '".$this->address."', designation = '".$this->designation."', intro = '".$this->intro."', dob = '".$this->dob."', company = '".$this->company."', id = '".$this->id."', other = '".$this->other."', status = '".$this->status."' ";
				$query = mysql_query($sql, $conn);
				if($query) {
					// aj_call($this->email);
					echo "Submitted Succesfully";
				}else {
					echo "Form not Submitted Succesfully";
				}
			}
			catch(Exception $e) {
				header("Location:login");
			}
			mysql_close($conn);
		}
		
		// public function display_profile() {

		// }

	}

?>
