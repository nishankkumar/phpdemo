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
            $_SESSION["name"] = $row[name];
            $_SESSION["email"] = $row[email];
            $_SESSION["pass"] = $row[pass];
            $_SESSION["status"] = $row[status];
            if($_POST["remember_ckeck"]){
                echo 'hello remark checked';
                setcookie("email", $_SESSION["email"], time()+120, "/","", 0);
                setcookie("pass", $_SESSION["pass"], time()+120, "/","", 0);
            }
        } else {
            $message = "Invalid Username or Password!";
        }
    }
    if(isset($_COOKIE["email"]) && isset($_COOKIE["pass"])) {
        echo 'inside using cookies';
        $_SESSION["email"] = $_COOKIE["email"];
        $_SESSION["pass"] = $_COOKIE["pass"];
        $_SESSION["status"] = $_COOKIE["status"];
        $_SESSION["name"] = $_COOKIE["name"];
    }
    if(isset($_SESSION["email"])) {
        header("Location:profile");
    }
?>
