function aj_call(email) {
    // console.log(email);
    $('.js_aj_data').load('user_in.php', {"user_email":email});
}
function signup_form_edit(email) {
    // console.log(email);
    $('.js_aj_data').load('user_signup_edit.php', {"user_email":email});
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
    // console.log(dataString);
    if(email) {
        $.ajax({
            type: "POST",
            url: "form_edit_submit.php",
            data: dataString,
            cache: false,
            success: function(result){
                // alert(result);
                aj_call(result);
            }
        });
    }else {
        $("#email").css('border-color','red');
    }
}
