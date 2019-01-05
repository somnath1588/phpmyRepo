<?php
include_once('loginandregistration.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <script type="text/javascript" src="register.js"></script> 
    <title>Login form</title>
    
</head>
<body>


<div class="tabs">
<button id="defaultOpen" class="tablinks" onclick="openCity(event, 'tabs-1')">SIGN IN
  <div class='crossLeft'></div>
</button>
  <button id="defaultlose" class="tablinks" onclick="openCity(event, 'tabs-2')">SIGN UP
  <div class='crossRight'></div>

  </button>
  </div>
  <div id="tabs-1" class='box'>
  
<h1><?php echo 'LOGIN'; ?></h1>

<form action="index.php" id='loginform' method="post">
        <div class='formation'>
        <span>Username</span>
        <input type="text" name="loginname" id="loginname" placeholder="Enter Username" autocomplete="off">
        </div>

        <div class='formation'>
        <span>Password</span>
        <input type="password" name="loginpass"  id="loginpass" placeholder="Enter Password" autocomplete="off">
        </div>
        <input type="hidden" id='loginpage' name="loginpage" value="loginpage" autocomplete="off">
        <input  class='submitBtn' type="submit" name ='submit' value='SignIn'>
        <div class='moveRight'><a href="#">Forgot Password</a></div>
        <div class='moveRight'><a href="#">Don't have an Account?</a></div>
        <div class='moveRight'><a href="RegistrationTable.php">Registered User</a></div>
</form>


  </div>

  <div id="tabs-2" class='box'>
 
<h1>Create Account</h1>
<form action="index.php" method="post" onsubmit='return validation()'>
        <div class='formation'>
        <span>Username</span>
        <input type="text" id='username' name="username" placeholder=" 
        Username" autocomplete="off">
        <span id="userError" class="usename"></span>
        </div>
        <div class='formation'>
        <span>Password</span>
        <input type="password" id='password' name="password" placeholder="Enter Password" autocomplete="off">
        <span id="passError" class="usename"></span>
        </div>
        <div class='formation'>
        <span>Confirm <br> Password</span>
        <input type="password" id='confirmpassword' name="confirmpassword" placeholder="Enter Confirm Password" autocomplete="off">
        <span id="confirmError" class="usename"></span>
        </div>
        <div class='formation'>
        <span class='adjustEmail'>Email</span>
        <input type="text" id='email' name="email" placeholder="Enter Email" autocomplete="off">
        <span id="emailError" class="usename"></span>
        </div>
        
        <input  class='submitBtn' type='submit' value="Sign_UP">
</form>

  </div>
</div>

 <script>
        function openCity(evt, tabName) {
        var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("box");
for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
}

tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tabcontent.length; i++) {
  tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
  </script>
</body>
</html>