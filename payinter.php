<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<form name="form1" action= "https://sandbox.interswitchng.com/collections/w/pay" method="post">
<input name="product_id" type="hidden" value="174" />
<input name="cust_id" type="hidden" value="000001" />
<input name="cust_name" type="hidden" value="XX" />
<input name="pay_item_id" type="hidden" value="23" />
<input name="amount" type="hidden" value="1000000" />
<input name="currency" type="hidden" value="566" />
<input name="site_redirect_url" type="hidden" value="http://localhost/luxen_hotel_and_resort/receipt"/>
<input name="txn_ref" type="hidden" value="7645536" />
<?php
$txn_ref = "7645536" ; 
$product_id = "174" ;
$pay_item_id = "23" ;
$amount = "1000000" ;
$site_redirect_url = "http://localhost/luxen_hotel_and_resort/receipt";
$mackey = "AC43543FA32234HB23423AFH843535" ;
$hashed = $txn_ref.$product_id.$pay_item_id.$amount.$site_redirect_url.$mackey ;
$hashed2 = openssl_digest($hashed, 'sha512');
$hash = hash('sha512', $txn_ref+$product_id+$pay_item_id+$amount+$site_redirect_url+$mackey);
 ?>
<input name="hash" type="text" value="<?php echo $hash ; ?>" />

<button type="submit" name="submit"> Submit</button>
</form>

</body>
</html>
