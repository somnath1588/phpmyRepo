function validation(){
 var username=document.getElementById("username");
 var passworduser=document.getElementById("password");
 var confirmpassword=document.getElementById("confirmpassword");
 var emailid=document.getElementById("email");

 //var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

    if(username.value ===""){
        username.focus();
        document.getElementById('userError').innerHTML='Please enter name';
        return false;
    }else if(username.value !=="" && passworduser.value ===""){
        document.getElementById('userError').innerHTML="";
        passworduser.focus();
        document.getElementById('passError').innerHTML='Please enter password';
        return false;
    }else if(username.value !=="" && passworduser.value !=="" && confirmpassword.value ===""){
        document.getElementById('userError').innerHTML="";
        document.getElementById('passError').innerHTML="";
        confirmpassword.focus();
        document.getElementById('confirmError').innerHTML='Please enter confirm password';
        return false;
    }else if(passworduser.value !== confirmpassword.value){
        document.getElementById('userError').innerHTML="";
        document.getElementById('passError').innerHTML="";
        confirmpassword.focus();
        document.getElementById('confirmError').innerHTML='Password dosenot match';
        return false;
    }else if(username.value !=="" && passworduser.value !=="" && confirmpassword.value !=="" && emailid.value ===""){
        document.getElementById('userError').innerHTML="";
        document.getElementById('passError').innerHTML="";
        document.getElementById('confirmError').innerHTML="";
        emailid.focus();
        document.getElementById('emailError').innerHTML='Please enter email';
        return false;
    }


    

}