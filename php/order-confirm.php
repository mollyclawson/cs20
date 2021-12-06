<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jade Delight</title>
<style type="text/css"> 
    .banner { 
        width: 100%; 
        background-color: #c3c3c3;
        color: #ff0000;
        height: 75px;
        text-align: center;
    }

</style>
</head>

<body>
<div class="banner">
    <h1>Jade Delight</h1>
</div>
<div>
    <h2>Thank you for your order!</h2>
    <h3>Your order details:</h3>
</div>
<?php
    $names = array("Chicken Chop Suey", "Sweet and Sour Pork", "Shrimp Lo Mein", "Moo Shi Chicken", "Fried Rice");
    $costs = array(4.5, 6.25, 5.25, 6.5, 2.35);
    $quans = array($_GET['quan0'], $_GET['quan1'], $_GET['quan2'], $_GET['quan3'], $_GET['quan4'], $_GET['quan5']);
    
    for ($i = 0; $i < 5; $i++) {
        if ($quans[$i] > 0) {
            $item = "<div>$quans[$i] $names[$i]";
            $cost = number_format($costs[$i], 2);
            $item .= " ($$cost each) </div>";
            echo $item;
        }
    }

    $subtotal = $_GET['subtotal'];
    $tax = $_GET['tax'];
	$total = $_GET['total'];
    $time = $_GET['time'];
    $email=$_GET['email'];
    $p_or_d=$_GET['p_or_d'];
    
    $str = "Subtotal: $subtotal<br>";
    $str .= "Tax: $tax<br>";
    $str .= "Total: $total<br>";
    $str .= "Time ready: $time<br>";
    $str .= "An order confirmation email has been sent to $email<br>";

    echo $str;
	
	$emailmsg = "Thank you for your order from Jade Delight!<br>";
    $emailmsg .= "The order total is $total<br>";
    if ($p_ord_d == "pickup") {
        $emailmsg.= "Your order will be ready for pickup at $time.";
    } else {
        $emailmsg.= "The estimated delivery time for your order is $time.";
    }

	mail("$email", "Jade Delight: Order Confirmation", $emailmsg);
	?>

</html>