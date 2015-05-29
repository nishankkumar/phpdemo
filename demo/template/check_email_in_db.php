<?php
    $conn = mysql_connect("localhost","root","") or die('unable to connect');
    mysql_select_db("comm",$conn) or die('unable to connect db');
    // $result = mysql_query($query);
    $result = mysql_query("SELECT * FROM user WHERE email='" . $_POST["email1"] . "' ");
    // $row  = mysql_fetch_array($result);   
    $row  = mysql_num_rows($result);
    if($row) {
        echo true;
    }else {
        echo false;
    }   
?>
