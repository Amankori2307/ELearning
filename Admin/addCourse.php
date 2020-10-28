<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');


    if(isset($_REQUEST['courseSubmitBtn'])){
        // Checking for empty fields
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Fill All Fields</div>";    
        }
        else{
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_price = $_REQUEST['course_price'];


            // Make file name unique
            $course_image = $_FILES['course_image']['name'];
            $course_image_temp = $_FILES['course_image']['tmp_name'];

            $filename = pathinfo($course_image, PATHINFO_FILENAME);
            $ext = pathinfo($course_image, PATHINFO_EXTENSION);

            // TO make filename unique
            $course_image = $filename.date('mdYhis').".".$ext;

            $img_folder = "../images/courseimg/".$course_image;
            move_uploaded_file($course_image_temp, $img_folder);


            $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) VALUES ('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')";
            // $msg = $course_name." ".$course_desc." ".$course_author." ".$course_duration." ".$course_original_price." ".$course_price;
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Course Added Successfully!</div>";    
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Add Course! $conn->error</div>";   
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc" class="form-control" row=2></textarea>
            <!-- <input type="text" class="form-control" id="course_desc" name="course_desc"> -->
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price">
        </div>
        <div class="form-group">
            <label for="course_image">Course Image</label>
            <input type="file" class="form-control-file" id="course_image" name="course_image">
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->
<?php
    include('./adminIncludes/footer.php')
?>