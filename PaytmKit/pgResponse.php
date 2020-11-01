<?php
if(!isset($_SESSION)){
	session_start();
}	
include_once('../dbConnection.php'); 

// if(isset($_COOKIE['session_id'])){
// 	echo "success";
//   $sid = $_COOKIE['session_id'];
//   if(!isset($_SESSION['is_login'])){
// 	$sql = "SELECT * FROM sessions WHERE session_id = '$sid'";
// 	$result = $conn->query($sql);
// 	if($result->num_rows > 0){
// 		$row = $result->fetch_assoc();
// 		$_SESSION['is_login'] = true;
// 		$_SESSION['stuLogEmail'] = $row['stuLogEmail'];
// 	}
//   }
// }
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.


		if(isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT'])){
			$order_id = $_POST['ORDERID'];
			if(isset($row['stuLogEmail'])){
				$stu_email = $row['stuLogEmail'] ;

			}
			else{
				$stu_email = $_SESSION['stuLogEmail'];
			}
			$course_id = $_SESSION['course_id'];
			$status = $_POST['STATUS'];
			$respmsg = $_POST['RESPMSG'];
			$amount = $_POST['TXNAMOUNT'];
			$date = $_POST['TXNDATE'];

			$sql = "INSERT INTO courseorder(order_id, stu_email, course_id, status, respmsg, amount, order_date) VALUES('$order_id', '$stu_email', '$course_id', '$status', '$respmsg', '$amount', '$date')";
			if($conn->query($sql) == TRUE){
				echo "Redirecting to My Courses";
				echo "<script>setTimeout(() => {
					location.href = '../Student/myCourse.php';
				},1500)</script>";
			}
			else{
				echo $conn->error;
			}
		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 	

	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>