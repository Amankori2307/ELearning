function checkAdminLogin(){
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();

    // console.log(adminLogEmail, adminLogPass);

    $.ajax({
        url: "Admin/admin.php",
        method:"POST",
        // dataType:"json",
        data: {
            checkLogEmail:"checkLogemail",
            adminLogEmail:adminLogEmail,
            adminLogPass:adminLogPass
        },
    
        success: function(data){
            if(data == 0){
                $("#adminStatusLogMsg").html("<small class='alert alert-danger'>Invalid Email ID or Password!</span>")
            }else if(data == 1){
                $("#adminStatusLogMsg").html("<small class='alert alert-success'>Success Loading ...</span>")

                setTimeout(() => {
                    window.location.href = "Admin/adminDashboard.php"
                }, 1000)
            }
        }

    })
}