<?php
session_start();
$message="";
if(count($_POST)>0) {
    $conn = mysql_connect("localhost","root","") or die('unable to connect');
    mysql_select_db("comm",$conn) or die('unable to connect db');
    $result = mysql_query("SELECT * FROM user WHERE email='" . $_POST["user_email"] . "' and pass = '". $_POST["password"]."'");
    $row  = mysql_fetch_array($result);
    if(is_array($row)) {
        $_SESSION["user_id"] = $row[id];
        $_SESSION["email"] = $row[email];
        $_SESSION["name"] = $row[name];
        if($_POST["remember_ckeck"]){
            setcookie("email", $_SESSION["email"], time()+120, "/","", 0);
            setcookie("pass", $_SESSION["name"], time()+120, "/","", 0);
        }
    } else {
        $message = "Invalid Username or Password!";
    }
}
if(isset($_SESSION["email"])) {
    header("Location:dashboard.php");
}
?>