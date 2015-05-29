$(document).ready(function(){
    $('#user_email').on('change',function(){
        checkEmailInDb( $(this).val() );     
    });
    $('#email').on('change',function(){
        checkEmailInDb( $(this).val() );     
    });
});
function checkEmailInDb( email ) {
    var dataString = 'email1='+email;
    console.log(dataString);
    $.ajax({
        type: "POST",
        url: "check_email_in_db.php",
        data: dataString,
        cache: false,
        success: function(result){
            // alert(result);
            // aj_call(result);
            // console.log(result);
            if(result) {
                $('.js_email_verified').show();
                $('.js_email_unverified').hide()

            console.log(result+'1');
            }else {
                $('.js_email_verified').hide();
                $('.js_email_unverified').show();
            console.log(result+'2');
            }
        }
    });
}
function checkEmailNotInDb( email ) {
    var dataString = 'email1='+email;
    console.log(dataString);
    var email_check = validateEmail(email);
    $.ajax({
        type: "POST",
        url: "check_email_in_db.php",
        data: dataString,
        cache: false,
        success: function(result){
            // alert(result);
            // aj_call(result);
            // console.log(result);
            if(!result && email_check) {
                $('.js_email_verified').show();
                $('.js_email_unverified').hide()

            console.log(result+'1');
            }else {
                $('.js_email_verified').hide();
                $('.js_email_unverified').show();
            console.log(result+'2');
            }
        }
    });
}
function validateForm() {
    var email = $('#user_email').val();
    var pass = $('#password').val();
    var email_check = validateEmail(email);
    console.log('inside alidate');
    if(!email_check) {
    console.log('email error alidate');
    $('#user_email').css('border-color','red');
        return false;
    }
    if(!pass) {
    $('#password').css('border-color','red');
    console.log('pass error alidate');
        return false;
    }
}
function sign_up() {
    // console.log(email);
    $('.js_form').load('user_signup.php');
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
                alert(result);
                // header("Location:base.php");
            }
        });
    }else {
        $("#email").css('border-color','red');
    }
}
function submit_signup_form() {
    var email = $("#email").val();
    var pass = $("#pass").val();
    var re_pass = $("#re_pass").val();
    //  Returns successful data submission message when the entered information is stored in database.
    var dataString = 'email1='+email+'&pass1='+pass;
    var log_data = 'user_email='+email+'&password='+pass;
    //  AJAX Code To Submit Form.
    console.log(dataString);
    var email_check = validateEmail(email);
    if(email_check && (pass==re_pass) && pass!="") {
        $.ajax({
            type: "POST",
            url: "form_signup_submit.php",
            data: dataString,
            cache: false,
            success: function(result){
                // alert(result);
                // aj_call(result);6
                $('.js_form').load('login_form.php');
            }
        });
    }else {
        if(!email_check){
            $("#email").css('border-color','red');
        }
        if(!pass){
            $("#pass").css('border-color','red');
        }
        if(pass != re_pass) {
            $("#re_pass").css('border-color','red');
        }
    }
}
function reset_pass() {
    // console.log(email);
    $('.js_form').load('reset_pass.php');
}
function reset_pass_form() {
    var email = $("#email").val();
    var old_pass = $("#old_pass").val();
    var pass = $("#pass").val();
    var re_pass = $("#re_pass").val();
    //  Returns successful data submission message when the entered information is stored in database.
    var dataString = 'email1='+email+'&pass1='+pass+'&old_pass1='+old_pass;
    var log_data = 'user_email='+email+'&password='+pass;
    //  AJAX Code To Submit Form.
    var email_check = validateEmail(email);
    console.log(dataString);
    if(email_check && (pass==re_pass) && pass!="" && old_pass!="") {
        $.ajax({
            type: "POST",
            url: "form_reset_pass.php",
            data: dataString,
            cache: false,
            success: function(result){
                // alert(result);
                // aj_call(result);
            // $('.js_form').load('login_form.php');
            login_form_load();
            }
        });
    }else {
        if(!email_check){
            $("#email").css('border-color','red');
        }
        if(!pass){
            $("#pass").css('border-color','red');
        }
        if(pass != re_pass) {
            $("#re_pass").css('border-color','red');
        }
        if(!old_pass) {
            $("#old_pass").css('border-color','red');
        }
    }
}
function login_form_load(){
    $('.js_form').load('login_form.php');
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
