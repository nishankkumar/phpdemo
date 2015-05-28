<?php
	require 'user_class.php';
	$user = new User();
	
	// print_r($user);
	
	$user->email = $_POST["email1"];
	$user->pass = $_POST["pass1"];
	
	// print_r($user->email);
	// print_r($user->pass);
	
	$user->add_to_db();
	// $user->display_profile();
		
?>
