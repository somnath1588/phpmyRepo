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
                if(response.status == 200){
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

                if(response.status == '200'){
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