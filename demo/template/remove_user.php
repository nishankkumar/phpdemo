<?php
	$conn = mysql_connect("localhost", "root", ""); // Establishing conn with Server..
	$db = mysql_select_db("comm", $conn); // Selecting Database
	//Fetching Values from URL
	$email=$_POST["email1"];
	//Insert query
	$sql = "DELETE FROM user WHERE email = '".$email."'";

	$query = mysql_query($sql, $conn);
	if($query) {
		// echo $email;
	}else {
		echo "Form not Submitted Succesfully";
	}
	mysql_close($conn); //conn Closed
?>
