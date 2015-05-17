<?php
	$conn = mysql_connect("localhost", "root", ""); // Establishing conn with Server..
	$db = mysql_select_db("comm", $conn); // Selecting Database
	//Fetching Values from URL
	$email=$_POST["email1"];
	$old_pass=$_POST["old_pass1"];
	$pass=$_POST["pass1"];
	//Insert query
	$sql = "UPDATE user SET pass = '".$pass."' WHERE email='" . $email . "' and pass = '". $old_pass."'";
	$query = mysql_query($sql, $conn);
	if($query) {
		// aj_call($email);
	}else {
		alert("Form not Submitted Succesfully");
	}
	mysql_close($conn); //conn Closed
?>
