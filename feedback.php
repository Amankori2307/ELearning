<!-- Start Sudent Feedback carousel -->
<div class="container-fluid" style="background-color:#4B7289" id="Feedback">
    <h1 class="text-center testyheading p-4">Student's Feedback</h1>
    <!-- Start carousel -->
    <div id="feedbackindicator" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#feedbackindicator" data-slide-to="0" class="active"></li>
            <li data-target="#feedbackindicator" data-slide-to="1"></li>
        </ol>
        <!-- End carousel inner -->
        <div class="carousel-inner pb-5">
            <div class="carousel-item active">  
                <!-- start Row -->
                <div class="row mx-5">
                    <?php
                        $sql = "SELECT * FROM feedback ORDER BY f_id DESC LIMIT 8";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                        $i = 0;
                        while($row = $result->fetch_assoc()){     
                        $sql = "SELECT * FROM student WHERE stu_id = {$row['stu_id']}";
                            $stu = $conn->query($sql);
                            $stu = $stu->fetch_assoc();
                    ?>
                    <?php 
                        if($i%4 == 0 && $i != 0){
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='carousel-item'>";     
                            echo "<div class='row'>";
                        }
                    ?>
                    <div class="media col-sm-6 col-md-3">
                        <img class="mr-3 img-fluid rounded-circle" style="width:64px;" src="<?php echo str_replace('..','.',$stu['stu_img']);?>" alt="Profile">
                        <div class="media-body text-white ">
                        <h5 class="mt-0 "><?php echo $stu['stu_name'];?></h5>
                        <?php echo $row['f_content'];?>
                        </div>
                    </div>

                    <?php
                            $i++;
                        }
                        }
                    ?>
                </div>
                <!-- End Row -->        

            </div>
            <!-- End Carousel Item -->

            <!--Previous Button  -->
            <a class="carousel-control-prev" href="#feedbackindicator" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon custom-carousel-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <!-- Next Button  -->
            <a class="carousel-control-next" href="#feedbackindicator" role="button" data-slide="next">
            <span class="carousel-control-next-icon custom-carousel-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>

        </div>
        <!-- End carousel inner -->
    </div>
    <!-- End carousel -->
</div>
<!-- End Sudent Feedback carousel -->
