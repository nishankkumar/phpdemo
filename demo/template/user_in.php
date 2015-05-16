<?php
    $conn = mysql_connect("localhost","root","") or die('unable to connect');
    mysql_select_db("comm",$conn) or die('unable to connect db');
    $email = $_POST["user_email"];
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
                	<div class="form_control">
                    	<span>Name</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_name"><?php echo $row["name"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Mobile</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["mobile"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Email</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["email"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Address</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["address"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Designation</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["designation"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Intro</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["intro"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>DOB</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["dob"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Company</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["company"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Company Id</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["id"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Extras</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["other"]; ?></span>
                	</div>
                	<div class="form_control">
                    	<span>Satus</span>
                    	<span class="colan_wrap">:</span>
                        <span class="profile_data"><?php echo $row["status"]; ?></span>
                	</div>
                </form>
                <?php echo '<span class="admin_style">'. $stat . '</span>';
                    echo '<a class="edit_button" onClick="signup_form_edit('."'".$row["email"]."'".')">Edit</a>';
                ?>
            </div>
<?php            
    }
    mysql_close($conn);
?>
