<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upchar Online Medical Solution | Secure Payment</title>
<link rel="shortcut icon" type="image/png" href="<?=base_url();?>assets/images/fev.png"/>
<meta name="cache-control" content="no-cache" />
<meta name="expires" content="0" />
<meta name="pragma" content="no-cache" />
</head>

<body>
<div style='text-align:center;position:absolute;top:45%;left:25%;'><h2>Please Do not press Back/Forward/Refresh button of your Browser.</h2>
<h3>You will be redirected to Payment Page...</h3>
</div>
<form method="post" name="paygate" action="<?=base_url()?>payment/ccavRequestHandler.php">
<input type="hidden" name="tid" id="tid" readonly />
<input type="hidden" name="merchant_id" value="<?=base64_decode(CC_MERID);?>"/>
<input type="hidden" name="order_id" value="<?=$Order_Id;?>"/>
<input type="hidden" name="amount" value="<?=$Amount;?>"/>
<input type="hidden" name="currency" value="INR"/>
<input type="hidden" name="redirect_url" value="<?=$Redirect_Url;?>"/>
<input type="hidden" name="cancel_url" value="<?=$cancel_Url;?>"/>
<input type="hidden" name="language" value="EN"/>
<input type="hidden" name="billing_name" value="<?=$billing_cust_name;?>"/>
<input type="hidden" name="billing_address" value="<?=$billing_cust_address;?>"/>
<input type="hidden" name="billing_city" value="<?=$billing_city;?>"/>
<input type="hidden" name="billing_state" value="<?=$billing_cust_state;?>"/>
<input type="hidden" name="billing_zip" value="<?=$billing_zip;?>"/>
<input type="hidden" name="billing_country" value="India"/>
<input type="hidden" name="billing_tel" value="<?=$billing_cust_tel;?>"/>
<input type="hidden" name="billing_email" value="<?=$billing_cust_email;?>"/>
<input type="hidden" name="delivery_name" value="<?=$delivery_cust_name;?>"/>
<input type="hidden" name="delivery_address" value="<?=$delivery_cust_address;?>"/>
<input type="hidden" name="delivery_city" value="<?=$delivery_city;?>"/>
<input type="hidden" name="delivery_state" value="<?=$delivery_cust_state;?>"/>
<input type="hidden" name="delivery_zip" value="<?=$delivery_zip;?>"/>
<input type="hidden" name="delivery_country" value="India"/>
<input type="hidden" name="delivery_tel" value="<?=$delivery_cust_tel;?>"/>
<input type="hidden" name="merchant_param1" value="<?=$merchant_param1;?>"/>
<input type="hidden" name="merchant_param2" value=""/>
<input type="hidden" name="merchant_param3" value=""/>
<input type="hidden" name="merchant_param4" value=""/>
<input type="hidden" name="merchant_param5" value=""/>
<input type="hidden" name="promo_code" value=""/>
<input type="hidden" name="customer_identifier" value=""/>

</form>


<script>
function loadval()
{

  document.paygate.action="<?=base_url()?>payment/ccavRequestHandler.php";
  document.paygate.submit();
}
window.onload = loadval;
</script>
</body>
</html>