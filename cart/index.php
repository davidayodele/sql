<?php

session_start();

require('php/CreateDb.php'); // do not use require_once() unless no error output is desired.
require('php/component.php');
//require('php/header.php');

// create instance of Createdb class
$database = new CreateDb("starcany_loquodb", "liquor");

//$command = "mysql --user={$database->username} --password='{$database->password}' ". "-h {$database->servername} -D {$database->dbname} < {'./php'}";

//$output = shell_exec($command . '/query1.sql');
echo "errors: ". mysqli_error($database->con)."<br>";

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id");

        if(in_array($_POST['id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'id' => $_POST['id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

echo "Connected still!";
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

<h1> Hi there </h1>

<?php 
/*
if(file_exists($_SESSION['ROOT_PATH'] . '/php/CreateDb.php'))
{
 echo 'OK';
} else {
   echo 'KO';
}
*/
include("php/header.php"); // do not use require_once() 
?>
<div class="container">
        <div class="row text-center py-5">
            <?php
                echo "Hiyah";
                $result = $database->getData();                
                echo "Hiyah2";
                echo "$result";
                $row = mysqli_fetch_assoc($result);
                echo "row val: $row";
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['price'], $row['img'], $row['id']);
                }
            ?>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
