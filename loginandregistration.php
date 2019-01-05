
<?php
include('connection.php');
$success=false;
if(isset($_POST['loginpage'])){

    if(isset($_POST['loginname']) && $_POST['loginpass']){
        $name=$_POST['loginname'];
        $password1=$_POST['loginpass'];
        //echo $name;
        $sql3="SELECT * FROM user_registration WHERE user_name='$name' and password='$password1'";
        $out3=$con->query($sql3);
            if($out3->num_rows > 0){
               echo 'login succsufully done and you are in welcome page';
                $success = true;
            }else{
                echo '<h3 style="color:blue;text-align:center;font-size:30px;">Username or Password dose not exist </h3>';
            }
    
        }
}else{
    
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['email'])){
        $pass = $_POST["password"];
        $email= $_POST['email'];
        $username=$_POST['username'];
     
        $sql2= "SELECT * FROM user_registration WHERE user_name='$username' or email_id='$email'";
        $out2 = $con->query($sql2);
        //echo $out2;
                if(mysqli_num_rows($out2)>0){
                    echo '<h3 style="color:blue;text-align:center;font-size:30px;">User name or Email id already exists </h3>' ;
                }else{
                    $sql = "INSERT INTO `user_registration` ( `user_name`, `password`, `confirm_password`, `email_id`) VALUES ('".$_POST['username']."', '".$pass."', '".$_POST['confirmpassword']."', '".$_POST['email']."')";
                    $out = $con->query($sql);
                    if($out == 1){
                     echo '<h3 style="color:blue;text-align:center;font-size:30px;">Registration done successfully and please login .</h3>';
                    ?>
                    <a href='index.php'>Login</a>  
                    <?php
                    }
                }
    
    }
}
    if($success == true){
       // header("Location: welcome.php");
    }
    $con->close();
?>
