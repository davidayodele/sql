<?php
//order.php

require ("php/CreateDb.php"); // do not use require_once()
require ("php/component.php");

//$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)
$database = new CreateDb("starcany_loquodb", "vendors");

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
	$name = $_POST["vendor_name"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["vendor_email"];
    $phone = $_POST["vendor_phone"];
    $addr = $_POST["vendor_addr"];
    $site = $_POST["vendor_site"];
    
    
    // $query = "INSERT INTO orders (product_id, email)
    // VALUES ($prod, $email)";

    $query = "INSERT INTO vendors (vendor_name, website, addr, email) VALUES
    ('$name', '$site', '$addr', '$email');";

    //echo $query."<br>";
    //print_r($database->con); // will not run if using print!!!

    /*
    (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vendor_name VARCHAR (255) NOT NULL DEFAULT 'N/A',
    website VARCHAR (255) NOT NULL DEFAULT 'N/A',
    addr VARCHAR (255) NOT NULL DEFAULT 'N/A',
    email VARCHAR (255) NOT NULL DEFAULT 'N/A'

    Email: <input type="email" name="vendor_email" placeholder="Enter your email" /><br />
Website: <input type="text" name="vendor_site" placeholder="Enter your website" /><br />
Name: <input type="text" name="vendor_name" placeholder="Enter your name" /><br />
Phone: <input type="tel" name="vendor_phone" placeholder="Enter your Phone number" /><br />
Address: <input type="text" name="vendor_addr" placeholder="Enter your Phone address" /><br />

     */
    
    $query_result = mysqli_query($database->con, $query);
    //echo($query_result);

    if($query_result) {
        //echo("QUERY SUCCESSFUL<br><br>");
    } else {
        echo "QUERY Error: ".mysqli_error($database->con)."<br>";
    }
    
	//print output text
	print "Thank you " . $name . "! We have received your request! Please check the email: ". $email. " for further steps.";
    print "<br><br>We will contact you soon!";
}

echo "<br><br><a href='index.php' class='btn'>Return</a>";
?>