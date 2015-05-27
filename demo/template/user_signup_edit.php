<?php
    $conn = mysql_connect("localhost","root","") or die('unable to connect');
    mysql_select_db("comm",$conn) or die('unable to connect db');
    $email = $_POST["user_email"];
    $result = mysql_query("SELECT * FROM img RIGHT OUTER JOIN user ON user.email=img.email WHERE user.email='" . $email . "'");
        
        while( $row  = mysql_fetch_array($result) ) {
            $path = $row["path"] ? $row["path"] : 'unknown.png';
            $stat = $row["status"] == "admin" ? $row["status"] : '';
            ?>
            <div class="profile_info_wrap">
                <label class="profile_img">
                    <?php echo '<img src="../statics/img/user/' . $path . '">'; ?>
                    <input class="inp_pro_img" type="file" />
                </label>
                <form class="profile_data">
                	<div class="form_control">
                    	<span>Name</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="name" id="name" value="<?php echo $row["name"]; ?>" placeholder="name" />
                	</div>
                	<div class="form_control">
                    	<span>Mobile</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="mobile" id="mobile" value="<?php echo $row["mobile"]; ?>" placeholder="mobile" />
                	</div>
                	<div class="form_control">
                    	<span>Email</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="email" id="email" value="<?php echo $row["email"]; ?>" placeholder="email" disabled />
                	</div>
                	<div class="form_control">
                    	<span>Address</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="address" id="address" value="<?php echo $row["address"]; ?>" placeholder="address" />
                	</div>
                	<div class="form_control">
                    	<span>Designation</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="designation" id="designation" value="<?php echo $row["designation"]; ?>" placeholder="designation" />
                	</div>
                	<div class="form_control">
                    	<span>Intro</span>
                    	<span class="colan_wrap">:</span>
                        <textarea class="profile_data" name="intro" id="intro" placeholder="intro"><?php echo $row["intro"]; ?></textarea>
                	</div>
                	<div class="form_control">
                    	<span>DOB</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="dob" id="dob" value="<?php echo $row["dob"]; ?>" placeholder="dob" />
                	</div>
                	<div class="form_control">
                    	<span>Company</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="company" id="company" value="<?php echo $row["company"]; ?>" placeholder="company" />
                	</div>
                	<div class="form_control">
                    	<span>Company Id</span>
                    	<span class="colan_wrap">:</span>
                        <input class="profile_data" type="text" name="id" id="id" value="<?php echo $row["id"]; ?>" placeholder="id" />
                	</div>
                	<div class="form_control">
                    	<span>Extras</span>
                    	<span class="colan_wrap">:</span>
                        <textarea class="profile_data" name="other" id="other" placeholder="other"><?php echo $row["other"]; ?></textarea>
                	</div>
                	<div class="form_control">
                    	<span>Satus</span>
                    	<span class="colan_wrap">:</span>
                        <textarea class="profile_data" name="status" id="status" placeholder="status"><?php echo $row["status"]; ?></textarea>
                	</div>
                    <div class="form_control">
                        <span></span>
                        <span class="colan_wrap"></span>
                        <input type="button" class="btn btn-success" value="OK" onClick="submit_form()"/>
                    </div>
                </form>
                <?php echo '<span class="admin_style">'. $stat . '</span>'?>
            </div>
<?php            
    }
    mysql_close($conn);
?>
