var session_email = null;
var session_status = null;
function aj_call(email) {
    // console.log(email);
    $('.js_loader').show();
    // $('.js_aj_data').load('user_in.php', {"user_email":email});
    $.ajax({
        type: "POST",
        url: "user_in_json.php",
        data: {"user_email":email},
        cache: false,
        dataType: 'json',
        success: function(data){
            renderUserfromJsonData(data);
        }
    });
    $('.js_loader').hide();
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

function remove_user(email, session_email) {
    var dataString = 'email1='+email;
    if(email) {
        $('.js_loader').show();
        $.ajax({
            type: "POST",
            url: "remove_user.php",
            data: dataString,
            cache: false,
            success: function(result){
                // alert(result);
                // aj_call(result);
                $('.js_all_user').load('all_user_list.php');
                console.log(session_email);
                $('.js_aj_data').load('user_in.php', {"user_email":session_email});
            },
            complete: function() {
                $('.js_loader').hide();
            }
        });
    }else {
        // $("#email").css('border-color','red');
    } 
}
function all_user_render() {
    $('.js_all_user').load('all_user_list.php');   
}
function renderUserfromJsonData(data) {
    $.each( data, function( index, user){
        var path = user.path ? user.path : 'unknown.png';
        var stat = user.status == "admin" ? user.status : '';
        var dataStr ='<div class="profile_info_wrap">'+
            '<span class="profile_img">'+
                '<img src="../statics/img/user/'+path+'">'+
            '</span>'+
                '<form class="profile_data">'+
                    '<div class="form_control">'+
                        '<span>Name</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_name">'+user.name+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Mobile</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.mobile+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Email</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.email+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Address</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.address+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Designation</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.designation+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Intro</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.intro+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>DOB</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.dob+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Company</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.company+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Company Id</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.id+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Extras</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.other+'</span>'+
                    '</div>'+
                    '<div class="form_control">'+
                        '<span>Satus</span>'+
                        '<span class="colan_wrap">:</span>'+
                        '<span class="profile_data">'+user.status+'</span>'+
                    '</div>'+
                '</form>'+
                    '<span class="admin_style">'+ stat+'</span>';
                    // '<a class="edit_button" onClick="signup_form_edit('+"'"+user.email+"'"+')">Edit</a>'+
            // '</div>';
            if (session_status == 'admin' || user.email == session_email) {
                dataStr += '<a class="edit_button" onClick="signup_form_edit('+"'"+user.email+"'"+')">Edit</a></div>';
            }else {
                dataStr += '</div>';
            }
            $('.js_aj_data').html(dataStr);
    });
}
