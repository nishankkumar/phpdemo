<?php
    session_start();
    $conn = mysql_connect("localhost","root","") or die('unable to connect');
    mysql_select_db("comm",$conn) or die('unable to connect db');
    $email = $_POST["user_email"];
    $result = mysql_query("SELECT * FROM img RIGHT OUTER JOIN user ON user.email=img.email WHERE user.email='" . $email . "'");
    $json_output = array();
        while( $row  = mysql_fetch_array($result) ) {
            $json_output[] = $row;
        }
    echo json_encode($json_output);
    mysql_close($conn);
?>
