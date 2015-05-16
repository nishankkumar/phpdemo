<?php
session_start();
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

    <link rel="shortcut icon" type="image/x-icon" href="../statics/img/favicon.ico">
    <link href="../statics/less/style/style.css" type="text/css" rel="stylesheet" />
    
    <script src="../statics/js/_libs/jquery-1.11.1.min.js" type="text/javascript" ></script>
    <script src="../statics/js/_libs/bootstrap.min.js" type="text/javascript" ></script>
    
    <script type="text/javascript">
        if (Function('/*@cc_on return document.documentMode===10@*/')()){
            document.documentElement.className+=' ie10';
        }
    </script>
    <script type="text/javascript">
        function aj_call(email) {
            console.log(email);
            $('.js_aj_data').load('user_in.php', {"user_email":email});
        }
        function signup_form_edit(email) {
            console.log(email);
            $('.js_aj_data').load('user_signup_edit.php', {"user_email":email});
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
                        // alert(result);
                        aj_call(result);
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
            <?php
            if($_SESSION["email"]) {
                ?>
                <span class="pull-right">Welcome <?php echo " ".$_SESSION["name"]." "; ?><a href="logout.php" tite="Logout"> Logout</a></span>
                <?php
            }
            ?>
        </div>
    </header>
    <div>
        
    </div>
    <div class="container-main js_aj_data">
        <?php
            $conn = mysql_connect("localhost","root","") or die('unable to connect');
            mysql_select_db("comm",$conn) or die('unable to connect db');
            $result = mysql_query("SELECT * FROM `user` AS e LEFT OUTER JOIN `img` AS u ON e.email = u.email");
            // if ($result > 0){
                if( !$result ) {
                    echo "string";
                }
                while( $row  = mysql_fetch_array($result) ) {
                    $path = $row["path"] ? $row["path"] : 'unknown.png';
                    $stat = $row["status"] == "admin" ? $row["status"] : '';
                    // echo '<a href="user_info.php?user_email='.$row["email"].'" class="user_info_wrap">';
                    echo '<div class="user_info_wrap" onClick="aj_call('."'".$row["email"]."'".')">';
        ?>
                        <span class="user_img">
                            <?php echo '<img src="../statics/img/user/' . $path . '" />'; ?>
                        </span>
                        <div class="user_data">
                            <p class="user_name"><?php echo $row["name"]; ?></p>
                            <p><?php echo $row["mobile"]; ?></p>
                            <p><?php echo $row["email"]; ?></p>
                            <p><?php echo $row["address"]; ?></p>
                        </div>
                        <?php echo '<span class="admin_style">'. $stat . '</span>'?>
                    </div>

        <?php
                // }
                // else {
        ?>
                <!-- <p class="no_user_selected">No users in your contact.</p> -->
        <?php            
                // }
            }
            mysql_close($conn);
        ?>
    </div> 
    <div class="footer">
        

    </div>
</div>

</body>
</html>
