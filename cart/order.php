<?php
//order.php
require ("php/CreateDb.php"); // do not use require_once()
require ("php/header.php");

session_start(); //storing session data for vars only
date_default_timezone_set('America/Phoenix');

$dbname = "starcany_loquodb",
$tablename = "liquor", 
$servername = "127.0.0.1", /*localhost*/
$username = "starcany_loq", /*root*/
$password = "Loquo1234!" /*blank*/

$db_conn = mysqli_connect($servername, $username, $password, $dbname); // must be in order (host, user, pass, db)
$_SESSION['conn_g'] = $db_conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
	$name = $_POST["customer_name"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["customer_email"];
	$prod = $_POST["product_id"];
    
    $query = "INSERT INTO orders (product_id, email)
    VALUES ($prod, $email)";

    $query_result = mysqli_query($db_conn, $query);

    if($query_result) {
        echo("QUERY SUCCESSFUL<br>");
    } else {
        echo "QUERY Error: ".mysqli_error($db_conn)."<br>";
    }
    
	//print output text
	print "Thank you " . $name . "!, We have received your order! Your customer id is your email: ". $email;
    print "We will contact you soon!";
}
?>