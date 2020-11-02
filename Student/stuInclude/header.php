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
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a href="../index.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learning</a>
    </nav>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-itm mb-3">
                            <img src="<?php if(isset($stu_img)){echo $stu_img;}?>" alt="display picture" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a href="studentProfile.php" class="nav-link" >
                                <i class="fas fa-user"></i>
                                Profle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php" class="nav-link" >
                                <i class="fab fa-accessible-icon"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link" >
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentChangePassword.php" class="nav-link" >
                                <i class="fas fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link" >
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        