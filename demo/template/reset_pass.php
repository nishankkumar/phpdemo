<div class="container-main login_form">
    <div class="field_wrap">
        <span>Email</span>
        <input class="custom_input" value="" id="email" name="user_email" type="text" placeholder="Email">
    </div>
    <div class="field_wrap">
        <span>Old Password</span>
        <input class="custom_input" value="" id="old_pass" name="pass" type="password" placeholder="Old Password">
    </div>
    <div class="field_wrap">
        <span>Password</span>
        <input class="custom_input" value="" id="pass" name="pass" type="password" placeholder="Password">
    </div>
    <div class="field_wrap">
        <span>Re-Password</span>
        <input class="custom_input" value="" id="re_pass" name="pass" type="password" placeholder="Re Password">
    </div>
    <div class="field_wrap">
        <span></span>
        <input class="button_main" type="submit" Value="Go" onClick="reset_pass_form()">
    </div>
    <!-- <div class="user_invalid"><?php if($message!="") { echo $message; } ?></div> -->
    <img src="../statics/img/back_btn.png" class="back_btn" onClick="login_form_load()">
    
</div>
