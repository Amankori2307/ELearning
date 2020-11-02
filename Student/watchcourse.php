<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include_once('../dbConnection.php');

    if($_SESSION['is_login']){
        $stu_email = $_SESSION['stuLogEmail'];
        
        $sql = "SELECT * FROM student WHERE stu_email = '$stu_email'";
        $result = $conn->query($sql);
        echo $conn->error;

        $row = $result->fetch_assoc();
        $stu_img = $row['stu_img'];
        $stu_name = $row['stu_name'];
        $stu_occ = $row['stu_occ'];
        $stu_id = $row['stu_id'];
    }else{
        echo "<script>location.href = '../index.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <!-- Font Aswome CSS -->
    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Profile</title>
</head>
<body>

    <div class="container-fluid bg-success p-2">
        <h3>Wlcome to E-Learning</h3>
        <a href="./myCourse.php" class="btn btn-danger">My Courses</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-light">
                <h4 class="text-center">Lessons</h4>
                <ul class="nav flex-column" id="playlist">
                                    
                    <?php
                        if(isset($_GET['course_id'])){
                            $course_id = $_GET['course_id'];
                            $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                            $result = $conn->query($sql);
                            echo $conn->error;
                            while($row = $result->fetch_assoc()){
                                
                    ?>
                    <li class="nav-item border-bottom py-2" movieurl="<?php echo $row['lesson_link'];?>" style="cursor:pointer"><?php echo $row['lesson_name'];?></li>
                    <?php 
                            }
                        }
                    ?>

                </ul>
            </div>
            <div class="col-sm-8">
                <video src="" class="mt-5 w-75 ml-2" id="videoarea" controls></video>
            </div>
        </div>
    </div>

    </div> <!-- Row close from header -->
    </div> <!-- Container-fluid close from header -->

	<!-- Jquery And Bootstrap JavaScript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>

	<!-- Font Awsome JS -->
	<script type="text/javascript" src="../js/all.min.js"></script>

    <!-- Custom js -->
	<script type="text/javascript" src="../js/custom.js"></script>

</body>
</html>