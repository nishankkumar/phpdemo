<?php include '_include/session.php' ?>
<?php include '_include/header.php' ?>

<div class="global">
    <header>
        <div class="container-main custom_header">
            <img src="../statics/img/logo_small.png">
        </div>
    </header>
    <div class="js_form">
        <form class="container-main login_form" action="" method="post" onsubmit="return validateForm()">
            <div class="field_wrap">
                <span>Email</span>
                <input class="custom_input" id="user_email" name="user_email" type="text" placeholder="Email">
                <a class="email_verified js_email_verified  glyphicon glyphicon-ok"></a>
                <a class="email_verified not js_email_unverified glyphicon glyphicon-remove"></a>
            </div>
            <div class="field_wrap">
                <span>Password</span>
                <input class="custom_input" id="password" name="password" type="password" placeholder="Password">
            </div>
            <div class="field_wrap">
                <span></span>
                <input class="button_main" type="submit" Value="Go">
                <label>
                    <input type="checkbox" name="remember_ckeck">
                    <p>Remember Password</p>
                </label>
                <label>
                    <a class="sign_up_btn" onClick="reset_pass()">Forget password ?</a>
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

<!-- <script src="../statics/js/submit_edited_form.js" type="text/javascript" ></script> -->
<?php
    require 'jsmin-1.1.1.php';
    $js=file_get_contents('../statics/js/submit_edited_form.js');
    $js=JSMin::minify($js);
    echo '<script type="text/javascript">'.$js.'</script>';
    // file_put_contents($writabledir.$name,$js);
?>
<?php include '_include/footer.php' ?>
