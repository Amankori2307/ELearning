<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
?>

<?php
    //  Fetch Course Data 

    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    }

    // Update
    if(isset($_REQUEST['lessonUpdateBtn'])){
        // Checking for empty fields
        if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Fill All Fields</div>";    
        }
        else{
            $lesson_id = $_REQUEST['lesson_id'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            


            if($_FILES['lesson_link']['name'] !== ""){
                $lesson_link = $_FILES['lesson_link']['name'];
                $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
    
                $filename = pathinfo($lesson_link, PATHINFO_FILENAME);
                $ext = pathinfo($lesson_link, PATHINFO_EXTENSION);
    
                // To make filename unique
                $lesson_link = $filename.date('mdYhis').".".$ext;
    
                $link_folder = "../lessonvid/".$lesson_link;
                move_uploaded_file($lesson_link_temp, $link_folder);
    
                $sql = "UPDATE  lesson  SET course_id = '$course_id',course_name = '$course_name', lesson_name = '$lesson_name', lesson_desc = '$lesson_desc', lesson_link = '$link_folder' WHERE lesson_id = {$lesson_id}";

            }else{
                $sql = "UPDATE  lesson  SET course_id = '$course_id',course_name = '$course_name', lesson_name = '$lesson_name', lesson_desc = '$lesson_desc' WHERE lesson_id = {$lesson_id}";
            }
                    
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Course Updated Successfully!</div>";    
                
        
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Update Course! $conn->error</div>";   
            }
            
        }
    }


?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Edit Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){echo $row['lesson_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){echo $row['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){echo $row['course_name'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];}?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc" cols="30" rows="3" class="form-control"><?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];}?></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Course Video</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php if(isset($row['lesson_link'])){echo $row['lesson_link'];}?>"  class="embed-responsive-item" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file mt-3" id="lesson_link" name="lesson_link">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonUpdateBtn" name="lessonUpdateBtn">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->
<?php
    include('adminIncludes/footer.php');
?>