<?php
include('./stuInclude/header.php');
?>

<?php
    // Adding Feedback Data
    if(isset($_REQUEST['submitFeedbackBtn'])){
        if($_REQUEST['f_content'] == ""){
            $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Pleas Write Your Feedback!</div>";   
        }
        else{
            $f_content = $_REQUEST['f_content'];
           
          
            $sql = "INSERT INTO feedback(f_content, stu_id) VALUES('$f_content', '$stu_id')";
                    
            if($conn->query($sql) == TRUE){
                $msg = "<div class='text-success col-sm-12 ml-5mt-2 text-center' >Feedback Added Successfully!</div>";    
                
        
            }else{
                $msg = "<div class='text-danger col-sm-12 ml-5mt-2 text-center' >Unable to Add Feedback! $conn->error</div>";   
            }
        }
    }
?>
<div class="col-sm-6 mt-5">
    <form action="" class="mx-5" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Sudent ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($stu_id)){echo $stu_id;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="f_content">Write Feedback: </label>
            <textarea name="f_content" id="f_content" class="form-control" row=2></textarea>
        </div>
        <?php if(isset($msg)){echo $msg;}?>
        <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>
    </form>
</div>
<?php
include('./stuInclude/footer.php');
?>
