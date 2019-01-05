<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type='text/css'>
            .form-group {
                margin: 6px 0px 6px 150px;
                height: 50px;
                border: 1px solid black;
                width: 60%;
                
                }

label.label {
    width: 45%;
    display: inline-block;
    padding: 15px 5px;
    float:left;
    font-size: 20px;
    font-family: cursive;
}

input.textBox {
    width:40%;
    margin: 6px 0px;
    height: 31px;
    width: 40%;
    font-size: 18px;
    font-family: cursive;
}

input.checkBOXEle {
    width: 25px;
    height: 25px;
    margin-top: 16px;
}

input.submitBtn {
    width: 100px;
    padding: 5px;
    margin-top: 8px;
    background: green;
    color: wheat;
    font-size: 20px;
    border: none;
}

label.labelRadio {
 
    font-size:17px;
    font-family: cursive;
}

input.radioElement {
    width: 17px;
    height: 17px;
}

    </style>
    <script type='text/javascript'>

var dataObject=[
    { 'labelText':'Credit Account No','name':'creditAccountNo', 'element':'input' , 'type':'text','value': 45555,'sequence':1},
    { 'labelText':'Credit Account Name','name':'creditAccountName', 'element':'input' ,'type':'text','value': 'john','sequence':2},
    { 'labelText':'Debit Account No','name':'debitAccountNo', 'element':'input' ,'type':'text','value': 45555,'sequence':3},
    { 'labelText':'Debit Account No','name':'debitAccountName', 'element':'input' ,'type':'text','value': 'dany','sequence':4},
    { 'both': [
            {'labelText':'Male','name':'Gender', 'element':'input' ,'type':'radio','value': 'male','sequence':5},
            {'labelText':'Female','name':'Gender', 'element':'input' ,'type':'radio','value': 'female','sequence':6}    
        ]},
        { 'both': [
            {'labelText':'Primary','name':'AccountType', 'element':'input' ,'type':'radio','value': 'primary','sequence':5},
            {'labelText':'Secondory','name':'AccountType', 'element':'input' ,'type':'radio','value': 'secondary','sequence':6}    
        ]},  

    { 'labelText':'submit form here','name':'submit', 'element':'input' ,'type':'submit','value': 'submit','sequence':7}
    ];
function construct(label,box,section,maincontainer){
        section.appendChild(label)
        section.appendChild(box);
        maincontainer.appendChild(section);
}


function loadForm(){

            var container = document.getElementById('formUser');
            
            for(var i =0 ; i < dataObject.length;i++){

                   //COMMON SECTION
                   var divSection = document.createElement('div');
                        divSection.setAttribute('class','form-group'); 

                if(dataObject[i].type == 'text'){
                
                    var label = document.createElement('label');
                    label.setAttribute('name',dataObject[i].name);
                    label.setAttribute('class','label');
                    label.innerHTML= dataObject[i].labelText;

                    var inputBox = document.createElement(dataObject[i].element);
                    inputBox.setAttribute('type',dataObject[i].type);
                    inputBox.setAttribute('class','textBox');
                    inputBox.setAttribute('name',dataObject[i].name);
                    inputBox.setAttribute('value',dataObject[i].value);
                    inputBox.onkeyup = function(){detectChanges();};

                    construct(label,inputBox,divSection,container);
                    
                }
                
                if(dataObject[i].both){

                var mybox=dataObject[i].both;
                var sectionGroup = document.createElement('div');
                    sectionGroup.setAttribute('class','radioSectionLeft');  

                    var label = document.createElement('label');
                    label.setAttribute('name',mybox[0].name);
                    label.setAttribute('class','label');
                    label.innerHTML= mybox[0].name;

                    sectionGroup.appendChild(label);
                    divSection.appendChild(sectionGroup);

                mybox.forEach(function(val){

                    var sectionGroup1 = document.createElement('div');
                        sectionGroup1.setAttribute('class','radioSectionRight');   
                        var label = document.createElement('label');
                    label.setAttribute('name',val.name);
                    label.setAttribute('class','labelRadio');
                    label.innerHTML= val.labelText;
                
                    var inputBox = document.createElement(val.element);
                    inputBox.setAttribute('type',val.type);
                    inputBox.setAttribute('class','radioElement');
                    inputBox.setAttribute('name',val.name);
                    inputBox.setAttribute('value',val.value);

                    sectionGroup1.appendChild(label);
                    sectionGroup1.appendChild(inputBox);
                    divSection.appendChild(sectionGroup1);

                     
                })

                 container.appendChild(divSection);

                }

                if(dataObject[i].type == 'submit'){

                      var label = document.createElement('label');
                    label.setAttribute('name',dataObject[i].name);
                    label.setAttribute('class','label');
                    label.innerHTML= dataObject[i].labelText;

                    var submitBtn = document.createElement('input');
                    submitBtn.setAttribute('type',dataObject[i].type);
                    submitBtn.setAttribute('class','submitBtn');
                    submitBtn.setAttribute('name',dataObject[i].name);
                    submitBtn.setAttribute('value',dataObject[i].value);
                  
                    construct(label,submitBtn,divSection,container);
                 }
            }
    }
</script>
</head>
<body onload='loadForm()'>
<h3>Dynamic form</h3>
<button name='hit' value='hit me' onClick='loadForm();'>hit me</button>

<div id='formUser'></div>

</body>
</html>