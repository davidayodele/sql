<?php
//order.php
require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

$database = new CreateDb("starcany_loquodb", "orders");

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
	$name = $_POST["customer_name"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["customer_email"];
	$prod = $_POST["product_id"];
    
    $sql = "INSERT INTO orders (product_id, email)
    VALUES ($prod, $email)";

    if ($database->con->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
	//print output text
	print "Thank you " . $name . "!, We have received your order! Your customer id is your email: ". $email;
    print "We will contact you soon!";
}
?>