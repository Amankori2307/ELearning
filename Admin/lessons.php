<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');

    $adminEmail = $_SESSION['adminLogEmail'];
?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group">
            <label for="checkid">Enter Course ID: </label>
            <input type="text" class="form-control mx-3" id="checkid" name="checkid" value="<?php if(isset($_SESSION['course_id'])){ echo $_SESSION['course_id'];}?>">
        </div>
        <button type="submit" class="btn btn-danger" name="searchBtn" value="searchBtn">Search</button>
    </form>

    <?php
        if(isset($_REQUEST['searchBtn']) && isset($_REQUEST['checkid'])){
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['course_name'] = $row['course_name'];

            if($row['course_id'] == $_REQUEST['checkid']){
                $sql = "SELECT * FROM lesson WHERE course_id = {$row['course_id']}";
                $result = $conn->query($sql);
    ?>
    <h3 class="mt-5 bg-dark text-white p-2">
        Course ID: <?php if($row['course_id']){ echo $row['course_id'];}?> 
        Course Name: <?php if($row['course_name']){ echo $row['course_name'];}?> 
    </h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="row">Lesson ID</th>
                <th scope="row">Lesson Name</th>
                <th scope="row">Lesson Link</th>
                <th scope="row">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <th scope="row"><?php echo $row['lesson_id']?></th>
                <td><?php echo $row['lesson_name']?></td>
                <td><?php echo $row['lesson_link']?></td>
                <td>
                    <form action="editLesson.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['lesson_id']?>">
                        <button
                            type="submit"
                            class="btn btn-info mr-3"
                            name="view"
                            value="View">
                            <i class="fas fa-pen"></i>    
                        </button>
                    </form>
                    
                    <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['lesson_id']?>">
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
    <div>
        <a class="btn btn-danger box" href="./addLesson.php">
            <i class="fas fa-plus fa-2x"></i>
        </a>
    </div>
    <?php
            }
        }
    ?>
</div>
</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->



<!--Start Delete course  -->
<?php

    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
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