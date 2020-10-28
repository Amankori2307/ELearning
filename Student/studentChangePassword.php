<?php
include('./stuInclude/header.php');
?>

<?php
    // Code to Change Password
    if(isset($_REQUEST['stuPassUpdateBtn'])){
        if($_REQUEST['stu_pass'] == ""){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Please Enter a New Password</div>";    
        }
        $sql = "SELECT * FROM student WHERE stu_email = '$stu_email'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $stu_pass = $_REQUEST['stu_pass'];
            $sql = "UPDATE student SET stu_pass = '$stu_pass' WHERE stu_email = '$stu_email'";
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Password Changes Successfully</div>";    
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >$conn->error</div>";    
            }
        }
    }
?>
<div class="col-sm-6 mt-5">
    <form class="mt-5 mx-5">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $stu_email;?>"readonly>
        </div>
        <div class="form-group">
            <label for="inputNewPassword">New Password</label>
            <input type="test" class="form-control" id="inputNewPassword" placeholder="New Password" name="stu_pass">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
    </form>
</div>
<?php
include('./stuInclude/footer.php');
?>
