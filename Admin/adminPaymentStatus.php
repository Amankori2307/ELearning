<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    include('adminIncludes/header.php');
    include('../dbConnection.php');
	// following files need to be included
	require_once("../PaytmKit/lib/config_paytm.php");
	require_once("../PaytmKit/lib/encdec_paytm.php");

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

?>
    <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
        <form action="" method="post">
            <div class="form-group ">
                <label for="" class="font-weight-bolder">Order ID:</label>
                <input type="text" class="form-control" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID?>" placeholder="Order ID">
            </div>
            <input type="submit" class="btn btn-primary" value="View">
        </form>
    <?php
        if (isset($responseParamList) && count($responseParamList)>0 ){ 
    ?>
        <div class="row mx-0">
            <!-- <h2 class="text-center">Payment Reciept</h2> -->
            <table class="table table-bordered mt-5">
                <tbody>
                    <?php
                        foreach($responseParamList as $paramName => $paramValue) {
                    ?>
                    <tr >
                        <td class="font-weight-bolder" ><?php echo $paramName?></td>
                        <td ><?php echo $paramValue?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print</button>
        </div>
    </div>
    <?php
		}
    ?>
<?php
    include('./adminIncludes/footer.php')
?>