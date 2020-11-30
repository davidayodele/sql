<?php
//order.php

require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

//$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)
$database = new CreateDb("starcany_loquodb", "liquor");

//include("header.php"); // do not use require_once() 
?>
<!DOCTYPE html>
<html lang="en">
<br>
<br>
<h2>New Product</h2>
<form method="post" action="admin.php">
Vendor_id: <input type="tel" name="vendor_id" placeholder="Enter the vendor" /><br />
Name: <input type="text" name="product_name" placeholder="Enter the name" /><br />
Expiration date: <input type="date" name="exp_date" placeholder="Enter the expiration date" /><br />
Price: <input type="tel" name="product_price" placeholder="Enter the unit price (integer only)" /><br />
Alcohol content: <input type="tel" name="etoh_amt" placeholder="Enter the total etoh content (% * vol)" /><br />
Image: <input type="url" name="product_img" placeholder="Enter an image location (optional)" /><br />
<input type="submit" value="Submit" />
</form>
</html>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
	$name = $_POST["product_name"]; //set PHP variables like this so we can use them anywhere in code below
    $vendor_id = $_POST["vendor_id"];
    $date = $_POST["exp_date"];
    $price = $_POST["product_price"];
    $etoh = $_POST["etoh_amt"];
    $img = $_POST["product_img"];
    
    // $query = "INSERT INTO orders (product_id, email)
    // VALUES ($prod, $email)";

    $query = "INSERT INTO liquor (product_name, price, vendor_id, exp_date, etoh_amt, reviews, img) VALUES
    ('$name', $price, $vendor_id, '$date', $etoh, '$img');";

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
	print "Success! " . $name . " has been added as a new product on ". $date;
    print "<br><br>Please check the DB to verify!";
    
}

echo "<br><br><a href='index.php' class='btn'>Return</a>";
?>