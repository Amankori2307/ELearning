
<!-- Start Including Header -->
<?php

    include('dbConnection.php');
    include('./includes/header.php');
    
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!-- End Including Header -->


<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/coursebanner.jpg" alt="coursebanner" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>
<!-- End Course Page Banner -->

<!-- Start Fetching Data -->
<?php
    if(isset($_GET['course_id'])){
        $sql = "SELECT * FROM course WHERE course_id = {$_GET['course_id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // setcookie("course_id", $row['course_id'], time() + (86400 * 30), "/");
        $_SESSION['course_id'] = $row['course_id'];
    }
?>
<!-- End Fetching Data -->

<!-- Start Main Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="<?php if(isset($row['course_img'])){ echo str_replace("..",".",$row['course_img']);}?>" alt="courseimage" class="card-img-top img_fluid">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php if(isset($row['course_name'])){ echo $row['course_name'];}?></h5>
                <p class="card-text">Description: <?php if(isset($row['course_desc'])){ echo $row['course_desc'];}?></p>
                <p class="card-text">Duration: <?php if(isset($row['course_duration'])){ echo $row['course_duration'];}?></p>
                <form action="checkout.php" method="post">
                    <p class="card-text d-inline">
                        <small><del>&#8377 <?php if(isset($row['course_original_price'])){ echo $row['course_original_price'];}?></del></small>
                        <span class="font-weight-bolder">&#8377 <?php if(isset($row['course_price'])){ echo $row['course_price'];}?></span>
                    </p>
                    <input type="hidden" name="course_price" value="<?php if(isset($row['course_price'])){ echo $row['course_price'];}?>">
                    <!-- <input type="hidden" name="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];}?>"> -->
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mx-0 mt-4">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET['course_id'])){
                        $sql = "SELECT * FROM lesson WHERE course_id = {$_GET['course_id']}";
                        $result = $conn->query($sql);
                        $l = 1;
                        while($row = $result->fetch_assoc()){

                ?> 
                            <tr>
                                <th scope="row"><?php echo $l;?></th>
                                <td><?php if(isset($row['lesson_name'])){ echo $row['lesson_name'];}?></td>
                            </tr>
                <?php        
                            $l++;  
                        }
                    }

                ?>
            </tbody>
        </table>
    </div>
    <!-- Start Including Footer -->
    <?php
        include('./includes/footer.php');
    ?>
    <!-- End Including Footer -->

</div>
<!-- End Main Content -->
