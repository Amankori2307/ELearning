
<!-- Start Including Header -->
<?php
    include('./includes/header.php');
?>
<!-- End Including Header -->

<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/coursebanner.jpg" alt="coursebanner" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>
<!-- End Course Page Banner -->

<!-- Start Main Content -->
    <div class="container">
        <h1 class="text-center my-4">Payment Status</h1>
        <form action="" method="post">
            <div class="form-group row">
                <label class="offset-sm-3 col-form-label">Order Id:</label>
                <div>
                    <input type="text" class="form-control mx-3">
                </div>
                <div>
                <input type="submit" class="btn btn-primary mx-4" value=View>

                </div>
            </div>
        </form>
    </div>
<!-- End Main Content -->


<!-- Start Including Contact -->
<?php
    include('./contact.php');
?>
<!-- End Including Contact -->


<!-- Start Including Footer -->
<?php
    include('./includes/footer.php');
?>
<!-- End Including Footer -->
