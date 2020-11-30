<?php
//order.php

require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

//$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)
$database = new CreateDb("starcany_loquodb", "reviewers");

//include("php/header.php"); // do not use require_once()

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
	$review = $_POST["customer_rev"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["reviewer_email"];
    $prod = $_POST["product_id"];
    $details = $_POST["customer_rev_text"];
    
    // $query = "INSERT INTO orders (product_id, email)
    // VALUES ($prod, $email)";

    /* 
    Email: <input type="email" name="reviewer_email" placeholder="Enter your email" /><br />
Product id: <input type="text" name="product_id" placeholder="Enter the product id" /><br />
Review (1 - 5): <input type="tel" name="customer_rev" placeholder="Enter your review" /><br />
Review details: <textarea name="customer_rev_text"></textarea><br />

(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (255) NOT NULL,
    review INT(11) NOT NULL DEFAULT 0,
    review_details VARCHAR (255) NOT NULL DEFAULT 'N/A',
    product_id VARCHAR (255) NOT NULL,
    FOREIGN KEY (email) REFERENCES customers(email),
    FOREIGN KEY (product_id) REFERENCES liquor(product_id)
    */

    $query = "INSERT INTO reviewers (email, customer_rev, customer_rev_text, product_id) VALUES
    ('$email', $review, '$details', $prod);";

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
	print "Thank you " . $email . "! We have received your review! Your rating of product " .$id. " was ". $review;
    print "<br><br>Thank you, we will contact you soon if you were dissatisfied!";
}
?>