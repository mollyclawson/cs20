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
    .itemName {
        width: 150px;
        display: inline-block;
    }
    .price {
        width: 80px;
        display: inline-block;
    }
    .hidden {
        display: none;
    }
    td {
        padding: 10px 5px;
    }

</style>
</head>

<body>

<script language="javascript">


function makeSelect(name, minRange, maxRange)
{
	var t= "";
	t = "<select name='" + name + "' size='1'>";
	for (j=minRange; j<=maxRange; j++)
	   t += "<option>" + j + "</option>";
	t+= "</select>"; 
	return t;
}
</script>
<div class="banner">
    <h1>Jade Delight</h1>
</div>

<form method='get' onsubmit="return validate()" action='http://webprogramming20.infinityfreeapp.com/php/order-confirm.php'>
<p>First Name: <input type="text"  name='fname' /></p>
<p>Last Name*:  <input type="text"  name='lname' /></p>
<p id="street" class="hidden">Street: <input name='street' /></p>
<p id="city" class="hidden">City: <input name='city' /></p>
<p>Phone*: <input type="text"  name='phone' /></p>
<p>Email*: <input type="text"  name='email' /></p>
<p> 
	<input type="radio" class="p_or_d" name="p_or_d" value = "pickup" checked="checked"/>Pickup  
	<input type="radio" class="p_or_d" name='p_or_d' value = 'delivery'/>
	Delivery
</p>

<?php 

//establish connection info
$server = "sql113.epizy.com";
$userid = "epiz_29741378";
$pw = "jGZplSQo9Vfp";
$db= "epiz_29741378_jadedelight";

// Create connection
$conn = new mysqli($server, $userid, $pw );


//select the database
$conn->select_db($db);
	
//run a query
$sql = "SELECT * FROM Menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <td><strong>Select Item</strong>
            <td><strong>Item Name</strong>
            <td><strong>Cost Each</strong>
            <td><strong>Total Cost</strong>
        </tr>
    ";
    $i = 0;
    while($row = $result->fetch_array()) {
        echo "<tr>";
            echo "<td>
                    <select name='quan$i' size='1'> 
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        </select>
                </td>
                <td name='name'> $row[0] </td>";
                $cost = number_format($row[1], 2);
                echo "<td name='price'> $$cost </td>
                <td> $<input type='text' name='cost'/> </td>";
        echo "</tr>";
    $i = $i + 1;
    }
    echo "</table>";
  } else {
    echo "no results";
  }
?>

<p>Subtotal: 
   $<input type="text"  name='subtotal' id="subtotal" />
</p>
<p>Mass tax 6.25%:
  $ <input type="text"  name='tax' id="tax" />
</p>
<p>Total: $ <input type="text"  name='total' id="total" />
</p>
<input type="text" name="time" class="hidden"/>

<input type = "submit" value = "Submit Order" />

</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script language="javascript">
            $(".p_or_d").change( function () {
                if (this.value == "delivery") {
                    $('#street').removeClass('hidden');
                    $('#city').removeClass('hidden');
                } else if (this.value == "pickup") {
                    $('#street').addClass('hidden');
                    $('#city').addClass('hidden');
                }
            }); 
        </script>
</body>
<script language="javascript">

	function finishOrder() {
		no_items = true;
		for (i = 0; i < 5; i++) {
			quantity = document.getElementsByName("quan"+i)[0].value;
			if (parseInt(quantity)) {
				no_items = false;
			}
		}
		if (no_items) {
			alert("You must order at least one item.");
			return false;
		}
		return true;
	}

	function calculateTime() {
		const date = new Date();
		time = date.getTime();
		hours = date.getHours() % 12;
		if (document.forms[0].p_or_d.value == "pickup") {
            minutes = date.getMinutes() + 15;
		} else {
			minutes = date.getMinutes() + 30;
		}
        if (minutes > 60) {
                minutes = minutes % 60;
                hours += 1;
        }
        if (minutes < 10) 
            minutes = "0" + minutes;
        timeObj = document.getElementsByName('time')[0];
        timeObj.value = (hours + ":" + minutes);
	}

	function validate() {
		if (document.forms[0].lname.value == "") {
			alert("Last name is required");
			document.forms[0].lname.focus();
			return false;
		}
		if (document.forms[0].phone.value == "") {
			alert("Phone number is required");
			document.forms[0].phone.focus();
			return false;
		} 
        if (document.forms[0].email.value == "") {
			alert("Email address is required");
			document.forms[0].email.focus();
			return false;
		}
		var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
		if (! (re.test(document.forms[0].phone.value))) {
			msg = "Phone number is invalid.\n";
			msg+= "Valid phone number formats include:\n";
			msg+= "(123)456-7890 \n 123-456-7890 \n 1234567890 \n";
			alert(msg);
			document.forms[0].phone.focus();
			document.forms[0].phone.select();
			return false;
		}
		if (document.forms[0].p_or_d.value == "delivery") {
			if(document.forms[0].street.value == "") {
				alert("Street is required for delivery");
				document.forms[0].street.focus();
				return false;
			}
			if(document.forms[0].city.value == "") {
				alert("City is required for delivery");
				document.forms[0].city.focus();
				return false;
			}
		}
        calculateTime();
		return finishOrder();
	}

	window.onload = function() {
		for (i = 0; i < 5; i++) {
			addCalculationEvent("quan"+i);
		}	
	}

	function addCalculationEvent(name) {
		selectObj = document.getElementsByName(name)[0];
		selectObj.onchange = function() {
			index = parseInt(name[4])
			textObj = document.getElementsByName('cost')[index];
            cost = (document.getElementsByName('price')[index].innerHTML);
            cost = cost.substring(2);
            cost = parseFloat(cost);
			textObj.value = (this.value * cost).toFixed(2);
			calculateTotals();
			}
		}

	function calculateTotals() {
		subtotal = 0;
		costs = document.getElementsByName('cost');
		for (i = 0; i < 5; i++) {
			value = parseFloat(costs[i].value);
			if (isNaN(value)) {
				continue;
			}
			subtotal+=value;
		}
		document.forms[0].subtotal.value = subtotal.toFixed(2);
		tax = (subtotal * .0625).toFixed(2);
		document.forms[0].tax.value = tax;
		total = (parseFloat(tax) + parseFloat(subtotal));
		document.forms[0].total.value = total.toFixed(2);
	}
	
</script>
</html>