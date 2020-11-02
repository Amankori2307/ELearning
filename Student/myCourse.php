<?php    
    include('./stuInclude/header.php')
    // I am not starting session or including database connection beacuse it is already done in header
?>

<?php

?>

<div class="container mt-5 ml-4">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Course</h4>
            <?php
                if(isset($_SESSION)){
                    $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration,c.course_author, c.course_img, c.course_desc, c.course_original_price, c.course_price 
                            FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id 
                            WHERE co.stu_email = '$stu_email'";
                    $result = $conn->query($sql);
                    echo $conn->error;
                    while($row = $result->fetch_assoc()){
                        
            ?>
            <div class="bg-light mb-3">
                <h5 class="card-header"><?php echo $row['course_name']?></h5>
                <div class="row">
                    <div class="col-sm-3 mt-4 ml-4">
                        <img src="<?php echo $row['course_img'];?>" alt="course image" class="card-img-top">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card-body">
                            <p class="card-title"><?php echo $row['course_desc'];?></p>
                            <small class="card-text">Duration: <?php echo $row['course_duration'];?></small><br>
                            <small class="card-text">Instructor: <?php echo $row['course_author'];?></small><br>
                            <p class="card-text d-inline">
                                <small><del>&#8377 <?php echo $row['course_original_price']?></del></small>
                                <small class="font-weight-bolder">&#8377 <?php echo $row['course_price']?></small>
                            </p>
                            <a href="watchcourse.php?course_id=<?php echo $row["course_id"];?>" class="btn btn-primary float-right mt-5">Watch Course</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                       
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
    include('./stuInclude/footer.php')
?>