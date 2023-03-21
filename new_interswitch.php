<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<title>Test Invoice</title>
	</head>	
	
	<body>	
    <?php
	$pay_id = rand(0, 1000);
	
	$member = get_user_id($_SESSION['username']);
	$member_part = mysql_fetch_array($member);
	?>
		<?php
			require 'InterSwitchWebPay.php';
			
			$product_id = $_GET['room_id'];
			$pay_item_id = $pay_id;
			$mac_key = '199F6031F20C63C18E2DC6F9CBA7689137661A05ADD4114ED10F5AFB64BE625B6A9993A634F590B64887EEB93FCFECB513EF9DE1C0B53FA33D287221D75643AB';
			$testmode = true;
			
			$InterSwitch = new InterSwitchWebPay($product_id, $pay_item_id, $mac_key, $testmode);
			
			if(isset($_GET['order_id'])) {
				echo "<h1>Redirecting to Payment Page</h1>";
				$order_id = $_GET['order_id'];
				$order_total = $_GET['total_amt'];
				$customer_fname = $member_part['username'];
				$customer_lname = $member_part['email'];
				$redirect_url = '<?php echo SITE_PATH; ?>process.php?order_no='.$_GET['order_id'];
				$InterSwitch->make_webpay_payment($redirect_url, $order_id, $order_total, $customer_fname, $customer_lname);
			}elseif(isset($_GET['order_no'])) {
				echo "<h1>Payment Check</h1>";
				$order_id = $_GET['order_no'];
				$order_total = $_GET['total_amt'];
				$response = $InterSwitch->check_webpay_response( $order_id,  $order_total);
				
				var_dump($response);
			}
		?>
		
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>