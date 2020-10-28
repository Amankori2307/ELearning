<!-- Start Popular Courses -->
<div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>  <!-- Actually this heading should be Newly Added Courses -->
      <!-- Start Card Deck -->
      <div class="card-deck mt-4">
        <?php
          $sql = "SELECT * FROM course ORDER BY course_id DESC LIMIT 6";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            $i = 0;
            while($row = $result->fetch_assoc()){                
              $course_id = $row['course_id'];
        ?>
        <?php 
            if($i%3 == 0 && $i != 0){
              echo "</div>";
              echo "<div class='card-deck mt-4'>";
            }
        ?>
        <div class="card d-flex align-items-stretch">
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
        <?php
              $i++;
            }
          }
        ?>
      </div>
      <!-- End Card Deck -->
      
    <div class="text-center mt-4">
        <a href="courses.php" class="btn btn-danger btn-sm">View All Course</a>
    </div>
  </div>
<!-- End Popular Courses -->
