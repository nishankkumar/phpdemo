<?php
	$conn = mysql_connect("localhost", "root", ""); // Establishing conn with Server..
	$db = mysql_select_db("comm", $conn); // Selecting Database
	//Fetching Values from URL
	$name=$_POST["name1"];
	$mobile=$_POST["mobile1"];
	$email=$_POST["email1"];
	$address=$_POST["address1"];
	$designation=$_POST["designation1"];
	$intro=$_POST["intro1"];
	$dob=$_POST["dob1"];
	$company=$_POST["company1"];
	$id=$_POST["id1"];
	$other=$_POST["other1"];
	$status=$_POST["status1"];
	// echo $name+$mobile+$email+$address+$designation+$intro+$dob+$company+$id+$other+$status;
	//Insert query
	$sql_check = "SELECT * FROM user WHERE email='".$email."'";
	$query_ckeck = mysql_query($sql_check, $conn);
	if($query_ckeck) {
		$sql = "UPDATE user SET name = '".$name."', mobile = '".$mobile."', email = '".$email."', address = '".$address."', designation = '".$designation."', intro = '".$intro."', dob = '".$dob."', company = '".$company."', id = '".$id."', other = '".$other."', status = '".$status."' WHERE email = '".$email."'";
	}else {
		$sql = "INSERT INTO user SET name = '".$name."', mobile = '".$mobile."', email = '".$email."', address = '".$address."', designation = '".$designation."', intro = '".$intro."', dob = '".$dob."', company = '".$company."', id = '".$id."', other = '".$other."', status = '".$status."'";
	}
	$query = mysql_query($sql, $conn);
	if($query) {
		echo $email;
	}else {
		echo "Form not Submitted Succesfully";
	}
	mysql_close($conn); //conn Closed
?>
