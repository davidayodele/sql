<?php
//order.php

require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

//$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
	$name = $_POST["customer_name"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["customer_email"];
	$prod = $_POST["product_id"];
    
    // $query = "INSERT INTO orders (product_id, email)
    // VALUES ($prod, $email)";

    $query = "INSERT INTO orders (price, product_id, email, volume) VALUES
    (34.95, '$prod', '$email', 40.0);";

    $query_result = mysqli_query($database->con, $query);
    if($query_result) {
        echo("QUERY SUCCESSFUL<br>");
    } else {
        echo "QUERY Error: ".mysqli_error($database->con)."<br>";
    }
    
	//print output text
	print "Thank you " . $name . "!, We have received your order! Your customer id is your email: ". $email;
    print "<br><br>We will contact you soon!";
}
?>