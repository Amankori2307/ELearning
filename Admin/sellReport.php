<?php
    include('adminIncludes/header.php');
    include('../dbConnection.php');
?>

<div class="col-sm-9 mt-5">
    <form action="" method="POST"class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <span>to</span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>
    <?php
        if(isset($_REQUEST['searchsubmit'])){
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];

            $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";

            $result = $conn->query($sql);
            if($result->num_rows > 0){
    ?>
        <p class="bg-dark text-white p-2 mt-4">Details</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $result->fetch_assoc()){

                ?>
                <tr>
                    <th scope="row"><?php echo $row['order_id']?></th>
                    <td><?php echo $row['course_id']?></td>
                    <td><?php echo $row['stu_email']?></td>
                    <td><?php echo $row['status']?></td>
                    <td><?php echo $row['order_date']?></td>
                    <td><?php echo $row['amount']?></td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
        </table>      
        <div class="row justify-content-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print</button>
        </div>
    <?php
    
            }else{
                echo "<p class='font-weight-bolder'>No Records Found</p>";
            }
        }
    ?>
</div>


</div> <!-- div Row close from header -->
</div> <!-- div Container-fluid close from header -->
<?php
    include('./adminIncludes/footer.php')
?>