<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- Font Aswome CSS -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
	<title>E-Learning</title>	
</head>
<body>

<!-- Start Navigation -->
<nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top">
  <a class="navbar-brand" href="index.php">E-Learning</a>
  <span class="navbar-text">Learn and Implement</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  </button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav custom-nav pl-5">
      <li class="nav-item custom-nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item custom-nav-item">
        <a class="nav-link" href="courses.php">Courses</a>
      </li>
      <li class="nav-item custom-nav-item">
        <a class="nav-link" href="paymentstatus.php">Payment Status</a>
      </li>
      <?php
        session_start();
        if(isset($_SESSION['is_login'])){
          echo '    <li class="nav-item custom-nav-item">
                      <a class="nav-link" href="Student/studentProfile.php">My Profile</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
              ';
        }
        else{
          echo '  
                    <li class="nav-item custom-nav-item">
                      <a class="nav-link" href="#" data-toggle="modal" data-target="#StudentLoginModal">Login</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                      <a class="nav-link" href="#" data-toggle="modal" data-target="#StudentRegisterModal">Signup</a>
                    </li>  
              ';
        }
      ?>

    
      <li class="nav-item custom-nav-item">
        <a class="nav-link" href="#Feedback">Feedback</a>
      </li>
      <li class="nav-item custom-nav-item">
        <a class="nav-link" href="#Contact">Contact</a>
      </li>
    </ul>
</div>
</nav>
<!-- End Navigation -->