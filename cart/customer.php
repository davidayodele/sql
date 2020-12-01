<?php
//order.php

require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

//$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)
$database = new CreateDb("starcany_loquodb", "customers");

include("php/header.php"); // do not use require_once()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
	$name = $_POST["customer_name"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["customer_email"];
    $dob = $_POST["customer_dob"];
    $phone = $_POST["customer_phone"];
    
    // $query = "INSERT INTO orders (product_id, email)
    // VALUES ($prod, $email)";

    /*
    Email: <input type="email" name="customer_email" placeholder="Enter your email" /><br />
Name: <input type="text" name="customer_name" placeholder="Enter your name" /><br />
Phone: <input type="tel" name="customer_phone" placeholder="Enter your Phone number" /><br />
DOB: <input type="date" name="customer_dob" placeholder="Enter your DOB" /><br />

    (email VARCHAR(255) NOT NULL DEFAULT 'N/A',
    order_id INT(11) NOT NULL,
    DOB DATE,
    phone char(50),
    customer_name VARCHAR (255),
 	FOREIGN KEY (order_id) REFERENCES orders(order_id)
    */

    if ($dob > '2000-11-30') {
        echo 'You are under 21 years of age. We will need permission to process your order.';
    }

    $query = "INSERT INTO customers (email, DOB, phone, customer_name) VALUES
    ('$email', '$dob', '$phone', '$name');
    
    INSERT INTO customers (order_id) SELECT
    order_id FROM orders 
    WHERE orders.email = customers.email
    LIMIT 1;";

    //echo $query."<br>";
    //print_r($database->con); // will not run if using print!!!
    
    $query_result = mysqli_query($database->con, $query);
    //echo($query_result);

    if($query_result) {
        //echo("QUERY SUCCESSFUL<br><br>");
    } else {
        echo "QUERY Error: ".mysqli_error($database->con)."<br>";
    }
    
	//print output text
	print "Thank you " . $name . "! We have received your request! Your customer id is your email: ". $email;
    print "<br><br>We will contact you soon!";
}

echo "<br><br><a href='index.php' class='btn'>Return</a>";
?>