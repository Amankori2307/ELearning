<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
?>
<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Courses</p>
   
    <?php 
        $sql = "SELECT * FROM  course ORDER BY course_id DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="row">Course ID</th>
                <th scope="row">Name</th>
                <th scope="row">Author</th>
                <th scope="row">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <th scope="row"><?php echo $row['course_id']?></th>
                <td><?php echo $row['course_name']?></td>
                <td><?php echo $row['course_desc']?></td>
                <td>
                    <form action="editcourse.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['course_id']?>">
                        <button
                            type="submit"
                            class="btn btn-info mr-3"
                            name="view"
                            value="View">
                            <i class="fas fa-pen"></i>    
                        </button>
                    </form>
                    
                    <form action="courses.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['course_id']?>">
                        <button
                            type="submit"
                            class="btn btn-secondary"
                            name="delete"
                            value="Delte">
                            <i class="far fa-trash-alt"></i>    
                        </button>
                    </form>
                </td>
            </tr>
            
            <?php 
                }
            ?>
        </tbody>
    </table>
    <?php }else{
        echo "0 results";
    }?>
</div>
</div>
<!-- div Row close from header -->
<div>
    <a href="addCourse.php" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div>
<!-- div Container-fluid close from header -->

<!--Start Delete course  -->
<?php

    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }else{
            
            echo "<script>alert($conn->error)</script>";
        }
    }
?>
<!--End  Delete course  -->

<?php
    include('./adminIncludes/footer.php')
?>