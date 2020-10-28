<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');


    if(isset($_REQUEST['lessonSubmitBtn'])){
        // Checking for empty fields
        if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Fill All Fields</div>";    
        }
        else{
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            

            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];

            $filename = pathinfo($lesson_link, PATHINFO_FILENAME);
            $ext = pathinfo($lesson_link, PATHINFO_EXTENSION);

            // // TO make filename unique
            $lesson_link = $filename.date('mdYhis').".".$ext;

            $link_folder = "../lessonvid/".$lesson_link;
            move_uploaded_file($lesson_link_temp, $link_folder);

            $sql = "INSERT INTO lesson (course_id, course_name, lesson_name, lesson_desc, lesson_link) VALUES ('$course_id','$course_name','$lesson_name','$lesson_desc','$link_folder')";

            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Lesson Added Successfully!</div>";    
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Add Lesson! $conn->error</div>";   
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc" cols="30" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Course Video</label>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->
<?php
    include('./adminIncludes/footer.php')
?>