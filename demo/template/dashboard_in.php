<?php 
    session_start();
    
    if(!isset($_SESSION["email"])) {
        header("Location:base.php");
    }
?>
<?php include '_include/header.php' ?>
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
    <div class="container-main">
        <div class="js_aj_data">
            
        </div>
        <div class="other_user_list">
            <?php
                $conn = mysql_connect("localhost","root","") or die('unable to connect');
                mysql_select_db("comm",$conn) or die('unable to connect db');
                $result = mysql_query("SELECT * FROM `img` AS u RIGHT OUTER JOIN `user` AS e ON e.email = u.email");
                // if ($result > 0){
                    if( !$result ) {
                        echo "string";
                    }
                    while( $row  = mysql_fetch_array($result) ) {
                        $path = $row["path"] ? $row["path"] : 'unknown.png';
                        $stat = $row["status"] == "admin" ? $row["status"] : '';
                        // echo '<a href="user_info.php?user_email='.$row["email"].'" class="user_info_wrap">';
                        echo '<div class="user_info_wrap profile_other" onClick="aj_call('."'".$row["email"]."'".')">';
            ?>
                            <span class="user_img">
                                <?php echo '<img src="../statics/img/user/' . $path . '" />'; ?>
                            </span>
                            <div class="user_data">
                                <p class="user_name">
                                <?php 
                                    if($row["name"]) {

                                        echo $row["name"]; 
                                    }else {
                                        echo $row["email"]; 

                                    }
                                ?></p>
                            </div>
                        </div>

            <?php            
                    }
                    mysql_close($conn);
            ?>
        </div>
    </div> 
    <div class="footer">
        

    </div>
</div>

<script src="../statics/js/dashboard.js" type="text/javascript" ></script>
<script type="text/javascript">
    aj_call(<?php echo "'".$_SESSION["email"]."'"; ?>);
</script>
<?php include '_include/footer.php' ?>
