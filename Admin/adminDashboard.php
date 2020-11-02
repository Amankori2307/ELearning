<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');


    $sql = "SELECT COUNT(*) FROM course";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $course_count = $row['COUNT(*)'];

    $sql = "SELECT COUNT(*) FROM student";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $student_count = $row['COUNT(*)'];
    
    $sql = "SELECT * FROM courseorder";
    $result = $conn->query($sql);
    $courseorder_count = $result->num_rows;

?>
            <div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width:18rem">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php if(isset($course_count)){echo $course_count;}?></h4>
                                <a href="./courses.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width:18rem">
                            <div class="card-header">Students</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php if(isset($student_count)){echo $course_count;}?></h4>
                                <a href="./students.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3" style="max-width:18rem">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php if(isset($courseorder_count)){echo $courseorder_count;}?></h4>
                                <a href="./sellReport.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="mx-5 mt-5 text-center">
                    <p class="bg-dark text-white p-2">Courses Ordered</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($courseorder_count > 0){
                                    while($row = $result->fetch_assoc()){
                            ?>
                             <tr>
                                <th scope="row"><?php echo $row['order_id']?></th>
                                <td><?php echo $row['course_id']?></td>
                                <td><?php echo $row['stu_email']?></td>
                                <td><?php echo $row['order_date']?></td>
                                <td><?php echo $row['amount']?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['co_id'];?>">
                                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
    <?php
        if(isset($_REQUEST['delete'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM courseorder WHERE co_id = '$id'";
            if($conn->query($sql) == TRUE){
                $sql = "SELECT * FROM courseorder";
                $result = $conn->query($sql);
                $courseorder_count = $result->num_rows;
            }
            else{
                echo "<script>alert($conn->error)</script>";
            }

        }
    ?>

<?php
    include('./adminIncludes/footer.php')
?>