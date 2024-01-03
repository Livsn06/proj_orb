//!signup validation

$(document).ready(function () {


    $(document).on("keyup","#spass", function(){
        isPassword("#spass");
    });

    $(document).on("click","#sbtn", function(){
        is_Signup();
    });
    
    $(document).on("click","#lbtn", function(){
        is_Login();
 
    });
    loginKeypress_Functionality();
    signupKeypress_Functionality();
    
});




function is_Login()
{
    var lemail = $("#lemail").val();
    var lpass = $("#lpass").val();


    if(lemail.length === 0 || lpass.length === 0){
        // show modal empty field
        $("#modal").load("../../validation/validate.php", {emptyLoginfieldModal: "yes"});
         //  id form change
        (lemail.length === 0 && !(lpass.length === 0))?  $("#lid-field").load("../../validation/validate.php", {emptyIDinput: "yes", email: lemail}):
            //  password form change
        (lpass.length === 0 && !(lemail.length === 0 ))?  $("#lpass-field").load("../../validation/validate.php", {emptyPassinput: "yes", pass: lpass}):"";
        
        if(lpass.length === 0 && lemail.length === 0 ){
             //  both form change
            $("#lid-field").load("../../validation/validate.php", {emptyIDinput: "yes", email: lemail});
            $("#lpass-field").load("../../validation/validate.php", {emptyPassinput: "yes", pass: lpass});
        }
  
    } else 
    if(!mailValidation(lemail.trim()) ){

        $("#modal").load("../../validation/validate.php", {invalidemail: "yes", email: lemail});
        $("#lid-field").load("../../validation/validate.php", {erroremailFormat: "yes", email: lemail});


    }else{
        $.post("../../validation/validate.php",
        {
            login: "set",
            email: lemail,
            pass: lpass,
    
        },
        function (result){
            $("#modal").html(result);
            $("#modal").load("../../validation/validate.php", {emtyModal: "yes"});

            $("#lid-field").load("../../validation/validate.php", {validateEmailinput: "yes", email: lemail, pass: lpass});

            $("#lpass-field").load("../../validation/validate.php", {validatePassinput: "yes", email: lemail, pass: lpass});
        });
    
    }
}


function loginKeypress_Functionality()
{
    $(document).on("keyup","#lemail",function () { 
        $("#lemail").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#lid-field small").css({"color" : "rgb(0, 181, 0)"});
        $("#lid-field small").text("");
    });
    $(document).on("keyup","#lpass",function () { 
        $("#lpass").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#lpass-field small").css({"color" : "rgb(0, 181, 0)"});
        $("#lpass-field small").text("");
    });
}



function mailValidation(val) 
{
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(val)

}



// TODO: NOT FINISH SIGNUP validation

function is_Signup()
{
    var sid = $("#sid").val();
    var semail = $("#semail").val();
    var spassword = $("#spassw").val();
    var scpassword = $("#scpass").val();


    // VALIDATE EMPTY FIELD
    if(semail.length === 0 || spassword.length === 0 ||  scpassword.length === 0  ||  sid.length === 0){

        $("#modal").load("../../validation/validate.php", {emptyLoginfieldModal: "yes"});

        if(sid.length === 0){
            $("#id-field").load("../../validation/validate.php", {sidEmpty: "yes", id: sid});
        }

        if(semail.length === 0){
            $("#email-field").load("../../validation/validate.php", {semailEmpty: "yes", email: semail});
        }

        if(spassword.length === 0){
            $("#spass-field").load("../../validation/validate.php", {spassEmpty: "yes", pass: spassword});
        }

        if(scpassword.length === 0){
            $("#cpass-field").load("../../validation/validate.php", {scpassEmpty: "yes", cpass: scpassword});
        }

    } else 
    if(!mailValidation(semail.trim()) ){

        $("#modal").load("../../validation/validate.php", {signupinvalidEmail: "yes", email: semail});

        $("#email-field").load("../../validation/validate.php", {signuperroremailFormat: "yes", email: semail});


    }else if (spassword.length < 8 ){

        $("#spass-field").load("../../validation/validate.php", {validatepasscount: "yes", pass: spassword});

    }else{
        $.post("../../validation/validate.php",
        {
            signup: "set",
            id: sid,
            email: semail,
            pass: spassword,
            cpass: scpassword
        },
        function (result){
            $("#modal").html(result);
            $("#modal").load("../../validation/validate.php", {emtyModal: "yes"});
        });
    }

}


function signupKeypress_Functionality()
{
    $(document).on("keyup","#semail",function () { 
        $("#semail").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#email-field small").css({"color" : "rgb(0, 181, 0)"});
        $("#email-field small").text("");
    });

    $(document).on("keyup","#sid",function () { 
        $("#sid").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#id-field small").css({"color" : "rgb(0, 181, 0)"});
        $("#id-field small").text("");
    });

    $(document).on("keyup","#spassw",function () {
        $("#spassw").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#spass-field small").css({"color" : "rgb(0, 181, 0)"});
        $("#spass-field small").text("");
    });

    $(document).on("keyup","#scpass",function () {
        passwordStrength('#scpass', '#scpassindicate');
    });
    $(document).on("keyup","#spassw",function () {
        passwordStrength('#spassw', '#spassindic');
    });



    $(document).on("keyup","#scpass",function () {
        $("#scpass").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#cpass-field small").css({"color" : "rgb(0, 181, 0)"});
        $("#cpass-field small").text("");
    });
}




function isvalid_Email(id)
{
    var email = $(id).val().trim();
    alert(email)
   if(!email.length == 0){
    if (mailValidation(email)) {
        $("#email-field input").css("outline-color", "green");
        $("#email-field small").text("* valid email");
        $("#email-field small").css("color", "green");
        return true;
    }else{  
        $("#email-field input").css("outline-color", "red");
        $("#email-field small").text("* invalid email");
        $("#email-field small").css("color", "red");
        return false;
    }    
   }else{
        $("#email-field input").css("outline-color", "red");
        $("#email-field small").text("* fill this form");
        $("#email-field small").css("color", "red");
        return false;
   }
}







function is_IDExist(id)
{
    var sid = $(id).val().trim();
    var res = false;
    if(sid.length == 0){
        $("#id-field input").css("outline-color", "red");
        $("#id-field small").text("* fill this form");
        $("#id-field small").css("color", "red");
        return false;
    }else{
        $("#id-field").load("../../validation/validate.php", {isExist: "yes", id: sid});
    }

}










// function submitValidation()
// {
//     var valid = 0;
//     if(!isID("#sid")){
//         $('#suserindic').text('Username must be at least 5 characters');
//         $("#suserindic").css("color", "red");
//         $("#suser").css("outline-color", "red");
//    }else{
//     valid +=1 ;
//    }
//    if(!isEmail("#semail")){
//         $('#semailindic').text('invalid email.');
//         $("#semailindic").css("color", "red");
//         $("#semail").css("outline-color", "red");

//    }else{
//     valid +=1 ;
//     }
//    if(!isPassword("#spass")){
//         $('#spassindic').text("invalid password");
//         $("#spassindic").css("color", "red");
//         $("#spass").css("outline-color", "red");

//    }else{
//     valid +=1 ;
//     }
   
//     if(!isConfirm("#spass", "#scpass")){
//         $('#scpassindic').text("invalid confirmation");
//         $("#scpassindic").css("color", "red");
//         $("#scpass").css("outline-color", "red");
  
//     }else{
//         valid +=1 ;
//     }
//    return valid == 4;
// }





function passwordStrength(id , indicid)
{
    var pass = $(id).val();
    var str =  checkPasswordStrength(pass);
   if(!pass.length <= 0){
    if (str < 2) {
        $(indicid).text('weak password');
        $(indicid).css("color", "#d6612f");
        $(pass).css("outline-color", "#d6612f");
        return true;
    }else if(str < 3){  
        $(indicid).text('medium password');
        $(indicid).css("color", "#918d1c");
        $(pass).css("outline-color", "#918d1c");
        return true;
    } else if(str < 4){
        $(indicid).text('strong password');
        $(indicid).css("color", "#128703");
        $(id).css("outline-color", "#128703");
        return true;
    }  
   }else{
    $(indicid).text("");
    $(indicid).css("color", "#2fb004");
    // $(pass).css("outline-color", "green");
    return false;
   }
}

function checkPasswordStrength(password) {

    var strength = 0;
    var tips = "";
  
    // Check password length
    if (password.length < 8) {
      tips += "Make the password longer. ";
    } else {
      strength += 1;
    }
  
    // Check for mixed case
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
      strength += 1;
    } else {
      tips += "Use both lowercase and uppercase letters. ";
    }
  
    // Check for numbers
    if (password.match(/\d/)) {
      strength += 1;
    } else {
      tips += "Include at least one number. ";
    }
  
    // Check for special characters
    if (password.match(/[^a-zA-Z\d]/)) {
      strength += 1;
    } else {
      tips += "Include at least one special character. ";
    }
  
    // Return results
  return strength;
  }

  
function isConfirm(id, cid)
{
    var pass = $(id).val();
    var cpass = $(cid).val();
   if(!pass.length <= 0){
    if(cpass.length <= 0){
        $('#scpassindic').text("required");
        $("#scpassindic").css("color", "orange");
        $(cid).css("outline-color", "green");
        return false;
    }else if (pass == cpass) {
        $('#scpassindic').text("similar password");
        $("#scpassindic").css("color", "green");
        $(cid).css("outline-color", "green");
        return true;
    }else{  
        $('#scpassindic').text('does not similar');
        $("#scpassindic").css("color", "red");
        $(cid).css("outline-color", "red");
        return false;
    }
   }else{
    $('#scpassindic').text("password needed");
    $("#scpassindic").css("color", "orange");
    $(cid).css("outline-color", "green");
    return false;
   }
}