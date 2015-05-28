<?php
	session_start();
	unset($_SESSION["id"]);
	unset($_SESSION["email"]);
//sestroy cookies
	if(isset($_COOKIE[session_name()])) {
	    setcookie(session_name(), '', time()-7000000, '/');
	}
// Finally, destroy the session.
	session_destroy();
	header("Location:login");
?>
