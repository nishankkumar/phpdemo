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

    <link rel="shortcut icon" type="image/x-icon" href="static/img/favicon.ico' %}">
    <link href="../statics/less/style/style.css" type="text/css" rel="stylesheet" />
    
    <script src="../statics/js/libs/jquery-1.11.1.min.js" type="text/javascript" ></script>
    <script src="../statics/js/libs/bootstrap.min.js" type="text/javascript" ></script>
    
    <script type="text/javascript">
        if (Function('/*@cc_on return document.documentMode===10@*/')()){
            document.documentElement.className+=' ie10';
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
    <div class="container-main">
        <?php
            $conn = mysql_connect("localhost","root","") or die('unable to connect');
            mysql_select_db("comm",$conn) or die('unable to connect db');
            $email = $_GET["user_email"];
            $result = mysql_query("SELECT * FROM user INNER JOIN img ON user.email=img.email WHERE user.email='" . $email . "'");
                
                while( $row  = mysql_fetch_array($result) ) {
                    $path = $row["path"] ? $row["path"] : 'unknown.png';
                    $stat = $row["status"] == "admin" ? $row["status"] : '';
                    ?>
                    <div class="profile_info_wrap">
                        <span class="profile_img">
                            <?php echo '<img src="../statics/img/user/' . $path . '">'; ?>
                        </span>
                        <form class="profile_data">
                        	<div class="form_comtrol">
	                        	<span>Name</span>
	                        	<span>:</span>
	                            <span class="profile_name"><?php echo $row["name"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Mobile</span>
	                        	<span>:</span>
	                            <span><?php echo $row["mobile"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Email</span>
	                        	<span>:</span>
	                            <span><?php echo $row["email"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Address</span>
	                        	<span>:</span>
	                            <span><?php echo $row["address"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Designation</span>
	                        	<span>:</span>
	                            <span><?php echo $row["designation"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Intro</span>
	                        	<span>:</span>
	                            <span><?php echo $row["intro"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>DOB</span>
	                        	<span>:</span>
	                            <span><?php echo $row["dob"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Company</span>
	                        	<span>:</span>
	                            <span><?php echo $row["company"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Company Id</span>
	                        	<span>:</span>
	                            <span><?php echo $row["id"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Extras</span>
	                        	<span>:</span>
	                            <span><?php echo $row["other"]; ?></span>
                        	</div>
                        	<div class="form_comtrol">
	                        	<span>Satus</span>
	                        	<span>:</span>
	                            <span><?php echo $row["status"]; ?></span>
                        	</div>
                        </form>
                        <?php echo '<span class="admin_style">'. $stat . '</span>'?>
                    </div>


        <?php
                
        ?>
        <?php            
            }
            mysql_close($conn);
        ?>
    </div> 
    <div class="footer">
        

    </div>
</div>

</body>
</html>
