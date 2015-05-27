<?php 
session_start();

if(!isset($_SESSION["email"])) {
    header("Location:base");
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
    <div>
        
    </div>
    <div class="container-main js_aj_data">
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
                    if($row["email"] == $_SESSION["email"]) {
                        echo '<div class="user_info_wrap" style="border-color:#e86024;" onClick="aj_call('."'".$row["email"]."'".')">';
                    }else {
                        echo '<div class="user_info_wrap" onClick="aj_call('."'".$row["email"]."'".')">';
                    }
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

<script src="../statics/js/dashboard.js" type="text/javascript" ></script>

<?php include '_include/footer.php' ?>
