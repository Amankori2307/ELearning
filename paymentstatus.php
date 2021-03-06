
<!-- Start Including Header -->
<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

    // following files need to be included
	require_once("./PaytmKit/lib/config_paytm.php");
	require_once("./PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

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
            <div class="form-group row ">
                <label class="offset-sm-3 col-form-label">Order Id:</label>
                <div>
                    <input type="text" class="form-control mx-3" name="ORDER_ID">
                </div>
                <div>
                <input type="submit" class="btn btn-primary mx-4" value=View>

                </div>
            </div>
        </form>
        <div class="row mx-0">
            <!-- <h2 class="text-center">Payment Reciept</h2> -->
            <table class="table table-bordered mt-5">
                <tbody>
                    <?php
                        foreach($responseParamList as $paramName => $paramValue) {
                            if(($paramName == "TXNID") || ($paramName == "ORDERID") || ($paramName == "TXNAMOUNT") || ($paramName == "STATUS")){

                            
                    ?>
                    <tr >
                        <td class="font-weight-bolder" ><?php echo $paramName?></td>
                        <td ><?php echo $paramValue?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print</button>
        </div>
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
