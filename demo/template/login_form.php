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
        <label>
            <a class="sign_up_btn" onClick="reset_pass()">Forget password ?</a>
        </label>
    </div>
    <!-- <div class="user_invalid"><?php if($message!="") { echo $message; } ?></div> -->
    <div>
        <a class="sign_up_btn" onClick="sign_up()">New User SignUp</a>
    </div>
</form>
