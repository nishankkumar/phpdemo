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
<!DOCTYPE html>
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>php</title>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
    <meta name="viewport" content="device-width">

    <link rel="shortcut icon" type="image/x-icon" href="statics/img/favicon.ico' %}">
    <link href="../statics/less/style/style.css" type="text/css" rel="stylesheet" />
    
    <script src="../statics/js/_libs/jquery-1.11.1.min.js" type="text/javascript" ></script>
    <script src="../statics/js/_libs/bootstrap.min.js" type="text/javascript" ></script>
    
    <script type="text/javascript">
        if (Function('/*@cc_on return document.documentMode===10@*/')()){
            document.documentElement.className+=' ie10';
        }
    </script>
    <script type="text/javascript">
        function sign_up() {
            // console.log(email);
            $('.js_form').load('user_signup.php');
        }
        function submit_form() {
            var name = $("#name").val();
            var mobile = $("#mobile").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var designation = $("#designation").val();
            var intro = $("#intro").val();
            var dob = $("#dob").val();
            var company = $("#company").val();
            var id = $("#id").val();
            var other = $("#other").val();
            var status = $("#status").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'name1='+name+'&mobile1='+mobile+'&email1='+email+'&address1='+address+'&designation1='+designation+'&intro1='+intro+'&dob1='+dob+'&company1='+company+'&id1='+id+'&other1='+other+'&status1='+status;
            // AJAX Code To Submit Form.
            console.log(dataString);
            if(email) {
                $.ajax({
                    type: "POST",
                    url: "form_edit_submit.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        alert(result);
                        // header("Location:base.php");
                    }
                });
            }else {
                $("#email").css('border-color','red');
            }
        }
    </script>
        
</head>

<body>
<div class="global">
    <header>
        <div class="container-main custom_header">
            <img src="../statics/img/logo_small.png">
        </div>
    </header>
    <div class="js_form">
        <form class="container-main login_form" action="" method="post">
            <div class="field_wrap">
                <span>Email</span>
                <input class="custom_input" name="user_email" type="text" placeholder="Email">
            </div>
            <div class="field_wrap">
                <span>Password</span>
                <input class="custom_input" name="password" type="password" placeholder="Password">
            </div>
            <div class="field_wrap">
                <span></span>
                <input class="button_main" type="submit" Value="Go">
                <label>
                    <input type="checkbox" name="remember_ckeck">
                    <p>Remember Password</p>
                </label>
            </div>
            <div class="user_invalid"><?php if($message!="") { echo $message; } ?></div>
            <div>
                <a class="sign_up_btn" onClick="sign_up()">New User SignUp</a>
            </div>
        </form>
    </div>
    <div class="footer">
        

    </div>
</div>

</body>
</html>
