<?php
    
?>
<!DOCTYPE html>
<html>
</<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="main.js"></script>
    <script>
$(document).ready(function(){
    $('.editBtn').on('click',function(){
        //hide edit span
        $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
        //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        //show edit button
        $(this).closest("tr").find(".saveBtn").show();
        
    });
    
    $('.saveBtn').on('click',function(){
        var trObj = $(this).closest("tr");
        var ID = $(this).closest("tr").attr('id');
        var inputData = $(this).closest("tr").find(".editInput").serialize();
        $.ajax({
            type:'POST',
            url:'userAction.php',
            dataType: "json",
            data:'action=edit&id='+ID+'&'+inputData,
            success:function(response){
                if(response.status == 'ok'){
                    trObj.find(".editSpan.fname").text(response.data.first_name);
                    trObj.find(".editSpan.lname").text(response.data.last_name);
                    trObj.find(".editSpan.email").text(response.data.email);
                    
                    trObj.find(".editInput.fname").text(response.data.first_name);
                    trObj.find(".editInput.lname").text(response.data.last_name);
                    trObj.find(".editInput.email").text(response.data.email);
                    
                    trObj.find(".editInput").hide();
                    trObj.find(".saveBtn").hide();
                    trObj.find(".editSpan").show();
                    trObj.find(".editBtn").show();
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    $('.deleteBtn').on('click',function(){
        //hide delete button
        $(this).closest("tr").find(".deleteBtn").hide();
        
        //show confirm button
        $(this).closest("tr").find(".confirmBtn").show();
        
    });
    
    $('.confirmBtn').on('click',function(){
        var trObj = $(this).closest("tr");
        var ID = $(this).closest("tr").attr('id');
        $.ajax({
            type:'POST',
            url:'userAction.php',
            dataType: "json",
            data:'action=delete&id='+ID,
            success:function(response){
                if(response.status == 'ok'){
                    trObj.remove();
                }else{
                    trObj.find(".confirmBtn").hide();
                    trObj.find(".deleteBtn").show();
                    alert(response.msg);
                }
            }
        });
    });
});
</script>
</head>
<body>
   <table width="600" border="1" cellpaddin="1", cellspacing="1">
        <tr>
           <th>Username</th>
           <th>Password</th>
           <th>Email-id</th>
           <th>EDIT</th>
           <th>REMOVE</th>
        </tr>
        <?php
            include('connection.php');
            $sql="SELECT user_name, password, email_id from user_registration";
            $result=$con->query($sql);
            while($array=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$array['user_name']."</td>";
                echo "<td>".$array['password']."</td>";
                echo "<td>".$array['email_id']."</td>";
                echo "<td> <a href='#'>EDIT</a> </td>";
                echo "<td> <a href='#'>REMOVE</a> </td>";
                echo "</tr>";
            }
             
            ?> 
        
   </table> 
</body>
</html>