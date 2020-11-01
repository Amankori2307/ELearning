<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href='loginorsignup.php' </script>";
    }else{
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        $stuLogEmail = $_SESSION['stuLogEmail'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Meta for Transaction -->
    <meta name="GENERATOR" content="Evrsoft First Page">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- Font Aswome CSS -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
	<title>Checkout</title>	
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="mb-5">Welcome to E-Learning Payment Page</h3>
                <form method="post" action="PaytmKit/pgRedirect.php">
                    <div class="form-group row">
                        <label for="ORDER_ID " class="col-sm-4 col-form-label">Order ID: </label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID " class="col-sm-4  col-form-label">Customer ID: </label>
                        <div class="col-sm-8">
                            <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuLogEmail)){ echo $stuLogEmail; }?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT " class="col-sm-4  col-form-label">Transaction Amount: </label>
                        <div class="col-sm-8">
                            <input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['course_price'])){echo $_POST['course_price'];}?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <!-- <label for="INDUSTRY_TYPE_ID " class="col-sm-4  col-form-label">Industry Type ID : </label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" class="form-control" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="CHANNEL_ID " class="col-sm-4  col-form-label">Channel ID : </label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="CHANNEL_ID" class="form-control" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary" value="CheckOut" type="submit" onclick="">
                        <a href="./courses.php" class="btn btn-secondary">Close</a>
                    </div>
                </form>
                <small class="font-text text-muted">Note: Complete Payment By Clicking CheckOut Button</small>
            </div>
        </div>
    </div>
    
 <!-- Jquery And Bootstrap JavaScript -->
 <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- Font Awsome JS -->
	<script type="text/javascript" src="js/all.min.js"></script>

  <!-- Student Ajax Call JavaScript -->
	<script type="text/javascript" src="js/ajaxrequest.js"></script>
	<script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>
<?php
    }
?>
