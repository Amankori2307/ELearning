<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
    $adminEmail = $_SESSION['adminLogEmail'];
?>
<?php
    if(isset($_REQUEST['adminPassUpdateBtn'])){
        if($_REQUEST['admin_pass'] == ""){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Please Enter a New Password</div>";    
        }
        $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $admin_pass = $_REQUEST['admin_pass'];
            $sql = "UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_email = '$adminEmail'";
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Password Changes Successfully</div>";    
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >$conn->error</div>";    
            }
        }
    }

?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail;?>"readonly>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword">New Password</label>
                    <input type="test" class="form-control" id="inputNewPassword" placeholder="New Password" name="admin_pass">
                </div>
                <?php if(isset($msg)){echo $msg;}?>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdateBtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            </form>
        </div>
    </div>    
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->

<?php
    include('./adminIncludes/footer.php')
?>