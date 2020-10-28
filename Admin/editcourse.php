<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
?>

<?php
    //  Fetch Course Data 

    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    }

    // Update
    if(isset($_REQUEST['requpdate'])){
        // Checking for empty fields
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Fill All Fields</div>";    
        }
        else{
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_price = $_REQUEST['course_price'];

            // Make file name unique
            if($_FILES['course_image']['name'] !== ""){
                $course_image = $_FILES['course_image']['name'];
                $course_image_temp = $_FILES['course_image']['tmp_name'];

                
                $filename = pathinfo($course_image, PATHINFO_FILENAME);
                $ext = pathinfo($course_image, PATHINFO_EXTENSION);

                // TO make filename unique
                $course_image = $filename.date('mdYhis').".".$ext;


                $img_folder = "../images/courseimg/".$course_image;
                move_uploaded_file($course_image_temp, $img_folder);
                $sql = "UPDATE  course  SET course_name = '$course_name', course_desc = '$course_desc', course_author = '$course_author', course_img = '$img_folder', course_duration = '$course_duration', course_price = '$course_price', course_original_price = '$course_original_price' WHERE course_id = {$course_id}";

            }else{
                $sql = "UPDATE  course  SET course_name = '$course_name', course_desc = '$course_desc', course_author = '$course_author', course_duration = '$course_duration', course_price = '$course_price', course_original_price = '$course_original_price' WHERE course_id = {$course_id}";
            }
            
        
            // $msg = $course_name." ".$course_desc." ".$course_author." ".$course_duration." ".$course_original_price." ".$course_price;
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Course Updated Successfully!</div>";    
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Update Course! $conn->error</div>";   
            }
        }
    }


?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Edit Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){ echo $row['course_name'];}?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc" class="form-control" row=2>
                <?php if(isset($row['course_desc'])){ echo $row['course_desc'];}?>
            </textarea>
            <!-- <input type="text" class="form-control" id="course_desc" name="course_desc" value="<?php if(isset($row['course_desc'])){ echo $row['course_desc'];}?>"> -->
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])){ echo $row['course_author'];}?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])){ echo $row['course_duration'];}?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($row['course_original_price'])){ echo $row['course_original_price'];}?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])){ echo $row['course_price'];}?>">
        </div>
        <div class="form-group">
            <label for="course_image">Course Image</label>
            <img src="<?php if(isset($row['course_img'])){ echo $row['course_img'];}?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_image" name="course_image">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->
<?php
    include('adminIncludes/footer.php');
?>