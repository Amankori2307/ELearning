<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
?>
<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Feedbacks</p>
   
    <?php 
        $sql = "SELECT * FROM  feedback ORDER BY f_id DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="row">Feedback ID</th>
                <th scope="row">Content</th>
                <th scope="row">Student ID</th>
                <th scope="row">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <th scope="row"><?php echo $row['f_id']?></th>
                <td><?php echo $row['f_content']?></td>
                <td><?php echo $row['stu_id']?></td>
                <td>
                    <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['f_id']?>">
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
        echo "0 Results";
    }?>
</div>

</div><!-- div Row close from header -->
</div><!-- div Container-fluid close from header -->

<!--Start Delete course  -->
<?php
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
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