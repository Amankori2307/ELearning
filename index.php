
<!-- Start Including Header -->
<?php
  include('dbConnection.php');
  include('./includes/header.php');
?>
<!-- End Including Header -->


<!-- Start Video Background -->
<div class="container-fluid  remove-vid-marg">
  <div class="vid-parent">
    <video playsinline autoplay muted loop>
      <source src="videos/banvid.mp4" >
    </video>
    <div class="vid-overlay"></div>
  </div>
  <div class="vid-content">
    <h1 class="my-content">Welcome to E-Learning</h1>
    <small class="my-content ">Learn and Implement</small><br>
    <?php
        if(!isset($_SESSION['is_login'])){
          echo '
            <a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#StudentRegisterModal">Get Started</a>
          ';
        }else{
          echo '
            <a href="Student/studentProfile.php" class="btn btn-primary mt-3" >My Profile</a>
          ';
        }
    ?>
      

  </div>

</div>
<!-- End Video Background -->

<!-- Start Text Banner -->
  <div class="container-fluid bg-danger text-banner">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-users mr-3"></i>Expert</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5> 
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Gurantee</h5>
      </div>
    </div>
  </div>
<!-- End Text Banner -->


<!-- Start Popular Courses -->
<?php
  include('./popularcourses.php'); 
?>
<!-- End Popular Courses -->
<!-- Start Contact Us -->
<?php
  include('./contact.php'); 
?>
<!-- End Contact Us -->
<!-- Start Feedback Carousel-->
<?php
  include('./feedback.php'); 
?>
<!-- End Feedback Carousel-->


<!-- Start Text Banner -->
<div class="container-fluid bg-danger text-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5><i class="fab fa-facebook-f mr-3"></i>Facebook</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fab fa-twitter mr-3"></i>Twitter</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fab fa-whatsapp mr-3"></i>WhatsApp</h5> 
    </div>
    <div class="col-sm">
      <h5><i class="fab fa-instagram mr-3"></i>Instagram</h5>
    </div>
  </div>
</div>
<!-- End Text Banner -->

<!-- Start About Section e9ecef-->
<div class="container-fluid p-4" style="background-color:#e9ecff">
  <div class="container" style="background-color:#e9ecff">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p>E-Learning provides universal acess to the world's best education, partnering with top universities and organizations to offer courses online.</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a href="#" class="text-dark">Web Development</a><br>
        <a href="#" class="text-dark">Web Designing</a><br>
        <a href="#" class="text-dark">Android App Dev</a><br>
        <a href="#" class="text-dark">IOS Development</a><br>
        <a href="#" class="text-dark">Data Analysis</a><br>
      </div>
      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>E-Learning, Near Rouses, New Orleans, California - 11XXXX <br>
        Phone: +xx xxxxxxxxxx <br>
        www.e-learning.com </p>
      </div>
    </div>
  </div>  
</div>
<!-- End About Section -->

<!-- Start Including Footer -->
<?php
  include('./includes/footer.php');
?>
<!-- End Including Footer -->
