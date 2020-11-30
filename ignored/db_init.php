<!--
Modified: 07-05-20
By: David Ayodele
-->
<?php
// Adapted from buley: https://stackoverflow.com/questions/9068767/php-mysql-create-database-if-not-exists
// Connect to MySQL
error_reporting(E_ERROR | E_PARSE);
define('scsn', TRUE);

session_start(); //storing session data for vars only
date_default_timezone_set('America/Phoenix');
$time = date('H:i:s');
$date = date('Y-m-d');
$datetime = "$date $time";
echo "Date is ".$date.", Time is ".$time."<br>";

$db_host = "localhost";
$db_user = "root";
//$db_name = "scsn_postings";
//$db_name = "scsn_cpr_signups";
//$db_name = "scsn_1staid_signups";
$db_name = "scsn_contact_forms";
$db_pass = "";

//cf1 - contact, cf2 - cna/lna, cf3 - cpr, cf4 - 1st aid

$db_table1 = "inquiries";
$db_table2 = "enrollments";
$db_table3 = "cpr_enrollments";
$db_table4 = "aid_enrollments";

$table1_col1_type = "msg_id int(11) AUTO_INCREMENT PRIMARY KEY not null";
$table1_col2_type = "msg_time datetime not null DEFAULT '$datetime'"; // datetime type cannot have 'N/A' as default value
$table1_col3_type = "fname varchar(256) not null DEFAULT 'N/A'";
$table1_col4_type = "lname varchar(256) not null DEFAULT 'N/A'";
$table1_col5_type = "phone varchar(256) not null DEFAULT 'N/A'";
$table1_col6_type = "email varchar(256) not null DEFAULT 'N/A'";
$table1_col7_type = "reply_type varchar(256) not null DEFAULT 'N/A'";
$table1_col8_type = "msg mediumtext not null";

$table1_col1 = "msg_id";
$table1_col2 = "msg_time";
$table1_col3 = "fname";
$table1_col4 = "lname";
$table1_col5 = "phone";
$table1_col6 = "email";
$table1_col7 = "reply_type";
$table1_col8 = "msg";

$table2_col1_type = "msg_id int(11) AUTO_INCREMENT PRIMARY KEY not null";
$table2_col2_type = "msg_time datetime not null DEFAULT '$datetime'"; // datetime type cannot have 'N/A' as default value
$table2_col3_type = "fname varchar(256) not null DEFAULT 'N/A'";
$table2_col4_type = "lname varchar(256) not null DEFAULT 'N/A'";
$table2_col5_type = "mname varchar(256) not null DEFAULT 'N/A'";
$table2_col6_type = "phone varchar(256) not null DEFAULT 'N/A'";
$table2_col7_type = "email varchar(256) not null DEFAULT 'N/A'";
$table2_col8_type = "addr varchar(256) not null DEFAULT 'N/A'";
$table2_col9_type = "city varchar(256) not null DEFAULT 'N/A'";
$table2_col10_type = "zip varchar(256) not null DEFAULT 'N/A'";
$table2_col11_type = "dob date not null DEFAULT '$date'"; // datetime type cannot have 'N/A' as default value
$table2_col12_type = "class_date date not null DEFAULT '$date'"; // datetime type cannot have 'N/A' as default value
$table2_col13_type = "class_time varchar(256) not null DEFAULT 'N/A'";
$table2_col14_type = "payment varchar(256) not null DEFAULT 'N/A'";
$table2_col15_type = "comments mediumtext not null";

$table2_col1 = "msg_id";
$table2_col2 = "msg_time";
$table2_col3 = "fname";
$table2_col4 = "lname";
$table2_col5 = "mname";
$table2_col6 = "phone";
$table2_col7 = "email";
$table2_col8 = "addr";
$table2_col9 = "city";
$table2_col10 = "zip";
$table2_col11 = "dob";
$table2_col12 = "class_date";
$table2_col13 = "class_time";
$table2_col14 = "payment";
$table2_col15 = "comments";

$table3_col1_type = "msg_id int(11) AUTO_INCREMENT PRIMARY KEY not null";
$table3_col2_type = "msg_time datetime not null DEFAULT '$datetime'"; // datetime type cannot have 'N/A' as default value
$table3_col3_type = "fname varchar(256) not null DEFAULT 'N/A'";
$table3_col4_type = "lname varchar(256) not null DEFAULT 'N/A'";
$table3_col5_type = "phone varchar(256) not null DEFAULT 'N/A'";
$table3_col6_type = "email varchar(256) not null DEFAULT 'N/A'";
$table3_col7_type = "class_date date not null DEFAULT '$date'"; // datetime type cannot have 'N/A' as default value
$table3_col8_type = "class_time varchar(256) not null DEFAULT 'N/A'";
$table3_col9_type = "cna_stat varchar(256) not null DEFAULT 'N/A'";
$table3_col10_type = "msg mediumtext not null";

$table3_col1 = "msg_id";
$table3_col2 = "msg_time";
$table3_col3 = "fname";
$table3_col4 = "lname";
$table3_col5 = "phone";
$table3_col6 = "email";
$table3_col7 = "class_date";
$table3_col8 = "class_time";
$table3_col9 = "cna_stat";
$table3_col10 = "msg";

$table4_col1_type = "msg_id int(11) AUTO_INCREMENT PRIMARY KEY not null";
$table4_col2_type = "msg_time datetime not null DEFAULT '$datetime'"; // datetime type cannot have 'N/A' as default value
$table4_col3_type = "fname varchar(256) not null DEFAULT 'N/A'";
$table4_col4_type = "lname varchar(256) not null DEFAULT 'N/A'";
$table4_col5_type = "phone varchar(256) not null DEFAULT 'N/A'";
$table4_col6_type = "email varchar(256) not null DEFAULT 'N/A'";
$table4_col7_type = "class_date date not null DEFAULT '$date'"; // datetime type cannot have 'N/A' as default value
$table4_col8_type = "class_time varchar(256) not null DEFAULT 'N/A'";
$table4_col9_type = "cna_stat varchar(256) not null DEFAULT 'N/A'";
$table4_col10_type = "msg mediumtext not null";

$table4_col1 = "msg_id";
$table4_col2 = "msg_time";
$table4_col3 = "fname";
$table4_col4 = "lname";
$table4_col5 = "phone";
$table4_col6 = "email";
$table4_col7 = "class_date";
$table4_col8 = "class_time";
$table4_col9 = "cna_stat";
$table4_col10 = "msg";



echo "establishing db server connection...<br>";
$db_conn = mysqli_connect($db_host, $db_user, $db_pass); // must be in order (host, user, pass, db)
$_SESSION['conn_g'] = $db_conn;

if(!$db_conn){
    die("Failed to connect db server: ".mysqli_connect_error());
} else {
    echo "db server connected!<br>";
}

/*
$link = mysql_connect('localhost', 'mysql_user', 'mysql_password');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
*/

echo "selecting db in server...<br>";
// Make selected db the current database
$db_selected = mysqli_select_db($db_conn, $db_name); // order of params very important, db_connection always first!

if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    $init_query = "CREATE DATABASE $db_name";

    if (mysqli_query($db_conn, $init_query)) { // order of params very important, db_connection always first!
        echo "New database successfully created!<br>";

        $query0 = "USE $db_name";
        $query0_result = mysqli_query($db_conn, $query0);
        if($query0_result) {
            echo("QUERY 0 SUCCESSFUL<br>");
        } else {
            echo "QUERY 0 Error: ".mysqli_error($db_conn)."<br>";
        }

        // Make table #1 in selected database
        $query1 = "create TABLE $db_table1 (
            $table1_col1_type, 
            $table1_col2_type,
            $table1_col3_type,
            $table1_col4_type,
            $table1_col5_type,
            $table1_col6_type,
            $table1_col7_type,
            $table1_col8_type
        );";

        $query1_result = mysqli_query($db_conn, $query1);

        // Check table 1
        if($query1_result) {
            echo("QUERY 1 SUCCESSFUL<br>");
        } else {
            echo "QUERY 1 Error: ".mysqli_error($db_conn)."<br>";
        }

        // Pass test values into table 1
        $query2 = "INSERT INTO $db_table1 ($table1_col1, $table1_col2, $table1_col3) VALUES (0, '$datetime', 'TEST')";
        $query2_result = mysqli_query($db_conn, $query2);

        // Check test values in table 1
        if($query2_result) {
            echo("QUERY 2 SUCCESSFUL<br>");
        } else {
            echo "QUERY 2 Error: ".mysqli_error($db_conn)."<br>";
        }

        // Make table #2 in selected database
        $query3 = "create TABLE $db_table2 (
            $table2_col1_type, 
            $table2_col2_type,
            $table2_col3_type,
            $table2_col4_type,
            $table2_col5_type,
            $table2_col6_type,
            $table2_col7_type,
            $table2_col8_type,
            $table2_col9_type,
            $table2_col10_type,
            $table2_col11_type,
            $table2_col12_type,
            $table2_col13_type,
            $table2_col14_type,
            $table2_col15_type
        );";

        $query3_result = mysqli_query($db_conn, $query3);

        // Check table 2
        if($query3_result) {
            echo("QUERY 3 SUCCESSFUL<br>");
        } else {
            echo "QUERY 3 Error: ".mysqli_error($db_conn)."<br>";
        }

        /* Pass test values into table 2
        $query4 = "INSERT INTO $db_table2 ($table2_col1, $table2_col2, $table2_col3) VALUES (0, '$datetime', 'TEST')";
        $query4_result = mysqli_query($db_conn, $query4);

        // Check test values in table 2
        if($query4_result) {
            echo("QUERY 4 SUCCESSFUL<br>");
        } else {
            echo "QUERY 4 Error: ".mysqli_error($db_conn)."<br>";
        }
        */

        // Make table #3 in selected database
        $query4 = "create TABLE $db_table3 (
            $table3_col1_type, 
            $table3_col2_type,
            $table3_col3_type,
            $table3_col4_type,
            $table3_col5_type,
            $table3_col6_type,
            $table3_col7_type,
            $table3_col8_type,
            $table3_col9_type,
            $table3_col10_type
        );";

        $query4_result = mysqli_query($db_conn, $query4);

        // Check table 3
        if($query4_result) {
            echo("QUERY 4 SUCCESSFUL<br>");
        } else {
            echo "QUERY 4 Error: ".mysqli_error($db_conn)."<br>";
        }

        // Make table #4 in selected database
        $query5 = "create TABLE $db_table4 (
            $table4_col1_type, 
            $table4_col2_type,
            $table4_col3_type,
            $table4_col4_type,
            $table4_col5_type,
            $table4_col6_type,
            $table4_col7_type,
            $table4_col8_type,
            $table4_col9_type,
            $table4_col10_type
        );";

        $query5_result = mysqli_query($db_conn, $query5);

        // Check table 4
        if($query5_result) {
            echo("QUERY 5 SUCCESSFUL<br>");
        } else {
            echo "QUERY 5 Error: ".mysqli_error($db_conn)."<br>";
        }

    } else {
        echo 'Error creating database: ' .mysqli_error()."<br>";
    }
} else {
    echo "Success!<br>Using the db: $db_name<br>";
}

//mysqli_close($db_conn);
?>  