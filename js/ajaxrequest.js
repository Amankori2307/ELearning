$().ready(function(){
    $("#stuemail").on("keypress blur", function(){
        var stuemail = $("#stuemail").val();
        var regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;    
        
        $.ajax({
            url:"Student/addstudent.php",
            method:'POST',
            data:{
                checkemail:"checkemail",
                stuemail:stuemail
            },
            success:function(data){
                if(data!=0){
                    $("#statusMsg2").html("<small style='color:red'>Email ID Already Used!</small>")
                    $("#signup").attr("disabled",true)
                }
                else if(!regex.test(stuemail)){
                    $('#statusMsg2').html('<small style="color:red;">Please Enter Valid Email e.g. example@mial.com!</small>')
                    $("#signup").attr("disabled",true)
                }
                else if(data == 0){
                    $("#statusMsg2").html("<small style='color:green'>There you go!</small>")
                    $("#signup").attr("disabled",false)
                }
            }
        }) 
    })
})

function addStu(){
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass= $("#stupass").val();
    var regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;    
    // Checking form fields on form submission
    if(stuname.trim() == ""){
        $('#statusMsg1').html('<small style="color:red;">Please Enter Name!</small>')
        $('#stuname').focus();
        return false;
    }
    
    else if(stuemail.trim() == ""){
        $('#statusMsg2').html('<small style="color:red;">Please Enter Email!</small>')
        $('#stuemail').focus();
        return false;
    }
    else if(!regex.test(stuemail)){
        $('#statusMsg2').html('<small style="color:red;">Please Enter Valid Email e.g. example@mial.com!</small>')
        $('#stuemail').focus();
        return false;
    }
    
    else if(stupass.trim() == ""){
        $('#statusMsg3').html('<small style="color:red;">Please Enter Password!</small>')
        $('#stupass').focus();
        return false;
    }
    else{
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            dataType:"json",
            data: {
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function(data){
                if(data=="OK"){
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successful!</span>")
                    clearStuRegField();
                }else if(data=="Failed"){
                    $('#successMsg').html("<span class='alert alert-danger'>Unable to Register</span>")
                }
            }
        })    
    }
}

// Empty All Fields

function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html("");
    $("#statusMsg2").html("");
    $("#statusMsg3").html("");
}

function checkStuLogin(){
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();


    $.ajax({
        url: "Student/addstudent.php",
        method:"POST",
        // dataType:"json",
        data: {
            checkLogEmail:"checkLogemail",
            stuLogEmail:stuLogEmail,
            stuLogPass:stuLogPass
        },
        success: function(data){
            if(data == 0){
                $("#statusLogMsg").html("<small class='alert alert-danger'>Invalid Email ID or Password!</span>")
            }else if(data == 1){
                $("#statusLogMsg").html("<div class='spinner-border test-success' role='status'></div>");
                setTimeout(() => {
                    window.location.href = "index.php"
                }, 1000)
            }
        }

    })
}