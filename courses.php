
<!-- Start Including Header -->
<?php
    include('dbConnection.php');
    include('./includes/header.php');
?>
<!-- End Including Header -->

<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/coursebanner.jpg" alt="coursebanner" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>
<!-- End Course Page Banner -->

<!-- Start All Course Container-->
<div class="container my-5">
  <h1 class="text-center">All Courses</h1>
  <!-- Start All Course -->
  <div class="row mt-4">
    <?php
      $sql = "SELECT * FROM course ORDER BY course_id DESC";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        $i = 0;
        while($row = $result->fetch_assoc()){                
          $course_id = $row['course_id'];
    ?>
    <div class=" col-sm-6 col-md-4  p-4 d-flex align-items-stretch">
      <div class="card ">
        <img src="<?php echo str_replace('..','.',$row['course_img']);?>" alt="course img" class="card-image-top img-fluid">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['course_name'];?></h5>
          <p class="card-text"><?php echo $row['course_desc'];?></p>
        </div>
        <div class="card-footer">
          <p class="card-text d-inline">Price: 
            <small><del>&#8377 <?php echo $row['course_original_price'];?></del></small>
            <small class="font-weight-bolder">&#8377 <?php echo $row['course_price'];?></small>
          </p>
          <a href="coursedetail.php?course_id=<?php echo $course_id?>" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
        </div>
      </div>
    </div>
    
    <?php
          $i++;
        }
      }
    ?>
  </div>
  <!-- End All Course -->
</div>
<!-- End All Course Container-->


<!-- Start Including Footer -->
<?php
    include('./includes/footer.php');
?>
<!-- End Including Footer -->
