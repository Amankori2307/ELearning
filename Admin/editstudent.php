<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
?>

<?php
    //  Fetch Course Data 

    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    }

    // Update
    if(isset($_REQUEST['updateStuSubmitBtn'])){
        // Checking for empty fields
        if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Fill All Fields</div>";    
        }
        else{
            $stu_id = $_REQUEST['stu_id'];
            $stu_name = $_REQUEST['stu_name'];
            $stu_email = $_REQUEST['stu_email'];
            $stu_pass = $_REQUEST['stu_pass'];
            $stu_occ = $_REQUEST['stu_occ'];

            $sql = "UPDATE  student  SET stu_name = '$stu_name', stu_email = '$stu_email', stu_pass = '$stu_pass', stu_occ = '$stu_occ' WHERE stu_id = {$stu_id}";
            
        
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Course Updated Successfully!</div>";    
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Update Course! $conn->error</div>";   
            }
        }
    }


?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Name</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($row['stu_id'])){ echo $row['stu_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name'])){ echo $row['stu_name'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email'])){ echo $row['stu_email'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="password" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass'])){ echo $row['stu_pass'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($row['stu_occ'])){ echo $row['stu_occ'];}?>">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="updateStuSubmitBtn" name="updateStuSubmitBtn">Update</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->
<?php
    include('adminIncludes/footer.php');
?>