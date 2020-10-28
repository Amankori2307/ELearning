<?php
include('./stuInclude/header.php');
?>

<?php
    // Update Student Data
    if(isset($_REQUEST['updateStuNameBtn'])){
        if(($_REQUEST['stu_name'] == "")|| ($_REQUEST['stu_occ'] == "")){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Fill All Fields!</div>";   
        }
        else{
            $stu_name = $_REQUEST['stu_name'];
            $stu_occ = $_REQUEST['stu_occ'];
           
            if(isset($_FILES['stu_img']) && $_FILES['stu_img']['name'] !== ""){
                $stu_img = $_FILES['stu_img']['name'];
                $stu_img_temp = $_FILES['stu_img']['tmp_name'];
    
                $filename = pathinfo($stu_img, PATHINFO_FILENAME);
                $ext = pathinfo($stu_img, PATHINFO_EXTENSION);
    
                // To make filename unique
                $stu_img = $filename.date('mdYhis').".".$ext;
    
                $img_folder = "../images/stu/".$stu_img;
                move_uploaded_file($stu_img_temp, $img_folder);
    
                $sql = "UPDATE  student  SET stu_name = '$stu_name',stu_occ = '$stu_occ', stu_img = '$img_folder' WHERE stu_id = {$stu_id}";

            }else{
                $sql = "UPDATE  student  SET stu_name = '$stu_name',stu_occ = '$stu_occ' WHERE stu_id = {$stu_id}";
            }
                    
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Student Updated Successfully!</div>";    
                
        
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Update Student! $conn->error</div>";   
            }
        }
    }
?>
<div class="col-sm-6 mt-5">
    <form action="" class="mx-5" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Sudent ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($stu_id)){echo $stu_id;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($stu_email)){echo $stu_email;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($stu_name)){echo $stu_name;}?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($stu_occ)){echo $stu_occ;}?>">
        </div>
        <div class="form-group">
            <label for="stu_img">Upload Image</label>
            <input type="file" class="form-control-file" id="stu_img" name="stu_img">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
    </form>
</div>
<?php
include('./stuInclude/footer.php');

?>
