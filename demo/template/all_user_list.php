<?php
    session_start();
    $conn = mysql_connect("localhost","root","") or die('unable to connect');
    mysql_select_db("comm",$conn) or die('unable to connect db');
    $result = mysql_query("SELECT * FROM `img` AS u RIGHT OUTER JOIN `user` AS e ON e.email = u.email");
    if( !$result ) {
        echo "string";
    }
    while( $row  = mysql_fetch_array($result) ) {
        $path = $row["path"] ? $row["path"] : 'unknown.png';
        $stat = $row["status"] == "admin" ? $row["status"] : '';
        if($row["email"] == $_SESSION["email"]){
            echo '<div class="user_info_wrap profile_other logined_user" onClick="aj_call('."'".$row["email"]."'".')">';
        }else {
            echo '<div class="user_info_wrap profile_other" onClick="aj_call('."'".$row["email"]."'".')">';
        }
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
                ?>
            </p>
        </div>
        <?php
            if ($row["email"] != $_SESSION["email"] && $_SESSION["status"] == 'admin') {
                 echo '<a class="remove_user glyphicon glyphicon-remove" onClick="remove_user('."'".$row["email"]."'".','."'".$_SESSION["email"]."'".')"></a>';
            }
        ?>
    </div>

<?php            
        }
        mysql_close($conn);
?>
