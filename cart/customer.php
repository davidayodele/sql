<?php
//order.php

require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

//$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)
$database = new CreateDb("starcany_loquodb", "customers");

include("php/header.php"); // do not use require_once()

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

    email VARCHAR(255) NOT NULL DEFAULT 'N/A',
    order_id INT(11) NOT NULL,
    DOB DATE,
    phone char(50),
    customer_name
    */

    $query = "INSERT INTO customers (email, DOB, phone, customer_name) VALUES
    ('$email', '$dob', '$phone', '$name');";

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

echo "<br><br><a href='sql/cart/index.php' class="btn">Return</a>";
?>