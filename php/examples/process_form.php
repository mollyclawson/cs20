<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Process the Form</title>
</head>

<body>
    <?php
   // extract ($_GET);
    //$n1 = $_GET["num1"];
    //$n2 = $_GET["num2"];
    $n1 = $_REQUEST["num1"];
    $n2 = $_REQUEST["num2"];
    $op = $_REQUEST["add_subtract2"];
    if ($op == 'add')
        $sum = $n1 + $n2;
    else 
        $sum = $n1 - $n2;
    echo "The sum is:  $sum<br>";
    
    
    ?>
    
</body>
</html>