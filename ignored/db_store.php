<!--
Modified: 07-05-20
By: David Ayodele
-->
<?php
// Adapted from buley: https://stackoverflow.com/questions/9068767/php-mysql-create-database-if-not-exists
// Connect to MySQL
error_reporting(E_ERROR | E_PARSE);

//cf1 - contact form, cf2 - cna/lna, cf3 - cpr, cf4 - 1st aid
if(!defined('scsn') && !isset($_POST['entry_1072099089']) && !isset($_POST['entry_138734728']) && !isset($_POST['entry_1106559346']) && !isset($_POST['entry_1660600340'])) {
    exit('Access Denied!');
}

include_once('../../db_conn/db_init.php');

function time_disp($seconds){
    $h = floor(($seconds/60)/60); // Hours
    $m = round(($seconds/60)) - ($h * 60); // Minutes
    echo '<span class="hours">'.$h.'</span> hrs : <span class="minutes">'.$m.'</span> mins'; // Display result   
}

function save($data, $path){
    echo("encoding data as json...<br>");
    $json_data = json_encode($data); // Convert data array back to json
    echo("successfully encoded data.<br>");
    echo("writing to file...<br>");
    $file = fopen($path, "w") or die("Unable to open file!"); // Open file
    fwrite($file, $json_data); // Save file with jsaon data
    echo("succesfully written, closing file: $path <br>");
    fclose($file);
    echo("file closed.<br>");
}

if (isset($_POST['entry_1072099089'])) {
    $cf1_name = $_POST['entry_1072099089'];
    //$cf1_fname = $_POST['cf1_fname'];
    //$cf1_lname = $_POST['cf1_lname'];
    $cf1_phone = $_POST['entry_1454483309'];
    $cf1_email = $_POST['entry_1370375900'];
    $cf1_reply_method = $_POST['entry_187878632'];
    $cf1_msg = $_POST['entry_532265958'];

    echo("reply method: $cf1_reply_method<br>");
    //print_r($_POST);

    // Start with query 6, 1-5 used in init. Stores values in table

    // Insert values in table 1
    $query6 = "INSERT INTO $db_table1 ($table1_col1, $table1_col2, $table1_col3, $table1_col4, $table1_col5, $table1_col6, $table1_col7, $table1_col8) VALUES (0, '$datetime', '$cf1_fname', '$cf1_lname', '$cf1_phone', '$cf1_email', '$cf1_reply_method', '$cf1_msg')";
    $query6_result = mysqli_query($db_conn, $query6);

    // Check test values in table 1
    if($query6_result) {
        echo("QUERY 6 SUCCESSFUL<br>");
    } else {
        echo "QUERY 6 Error: ".mysqli_error($db_conn)."<br>";
    }

    // Store in JSON file
    echo("encoding form data...<br>");

    $data = $_POST; // Store data array, form serialization necessary for json auto increment
    print_r($data);

    $contents = file_get_contents("../../db_conn/".$db_table1."_data.json"); // Will create if needed
    $tempArray = json_decode($contents, 1); // 1 for ASSOC = TRUE
    //array_push($tempArray, $data);
    $time = time();
    $tempArray[$time]['cf1_name'] = $cf1_name;
    //$tempArray[$time]['cf1_fname'] = $_POST['cf1_fname']; // PHP requires "." in $_POST to be "_"
    //$tempArray[$time]['cf1_lname'] = $_POST['cf1_lname'];
    $tempArray[$time]['cf1_phone'] = $cf1_phone;
    $tempArray[$time]['cf1_email'] = $cf1_email;
    $tempArray[$time]['cf1_reply_method'] = $cf1_reply_method;
    $tempArray[$time]['cf1_msg'] = $cf1_msg;
    save($tempArray, "../../db_conn/".$db_table1."_data.json");
    
} elseif (isset($_POST['entry_138734728'])) {
    print_r($_POST);
    
    $cf2_fname = $_POST['entry_138734728'];    
    $cf2_lname = $_POST['entry_599796675'];
    $cf2_mname = $_POST['entry_15662133'];
    $cf2_phone = $_POST['entry_2034737123'];
    $cf2_email = $_POST['entry_905978208'];
    $cf2_addr = $_POST['entry_545553206'];
    $cf2_city = $_POST['entry_549429267'];
    $cf2_zip = $_POST['entry_977104879'];
    $cf2_dob = $_POST['entry_819297371'];
    $cf2_class_date = $_POST['entry_293086397'];
    $cf2_class_time = $_POST['entry_757304114'];
    $cf2_pay_amt = $_POST['entry_2012352371'];
    $cf2_msg = $_POST['entry_6672004'];
   

    echo("first name: $cf2_fname<br>");
    //print_r($_POST);
    
    // insert values in table 2
    $query6 = "INSERT INTO $db_table2 ($table2_col1, $table2_col2, $table2_col3, $table2_col4, $table2_col5, $table2_col6, $table2_col7, $table2_col8, $table2_col9, $table2_col10, $table2_col11, $table2_col12, $table2_col13, $table2_col14, $table2_col15) VALUES (0, '$datetime', '$cf2_fname', '$cf2_mname', '$cf2_lname', '$cf2_phone', '$cf2_email', '$cf2_addr', '$cf2_city', '$cf2_zip', '$cf2_dob', '$cf2_class_date', '$cf2_class_time', '$cf2_pay_amt', '$cf2_msg')";
    $query6_result = mysqli_query($db_conn, $query6);

    // Check values in table 2
    if($query6_result) {
        echo("QUERY 6 SUCCESSFUL<br>");
    } else {
        echo "QUERY 6 Error: ".mysqli_error($db_conn)."<br>";
    }

    // Store in JSON file
    $data = $_POST; // Store data array, form serialization necessary for json auto increment
    print_r($data);

    $tempArray = array();
    $time = time();

    $contents = file_get_contents("../../db_conn/".$db_table2."_data.json"); // will create if neccessary
    $tempArray = json_decode($contents, 1); // 1 for ASSOC = TRUE
    //array_push($tempArray, $data);       
    //krsort($tempArray); // reverse key sort lib function
    $tempArray[$time]['cf2_fname'] = $cf2_fname; // PHP requires "." in $_POST to be "_"
    $tempArray[$time]['cf2_lname'] = $cf2_lname;
    $tempArray[$time]['cf2_mname'] = $cf2_mname;        
    $tempArray[$time]['cf2_phone'] = $cf2_phone;
    $tempArray[$time]['cf2_email'] = $cf2_email;
    $tempArray[$time]['cf2_addr'] = $cf2_addr;
    $tempArray[$time]['cf2_city'] = $cf2_city;
    $tempArray[$time]['cf2_zip'] = $cf2_zip;
    $tempArray[$time]['cf2_dob'] = $cf2_dob;
    $tempArray[$time]['cf2_class_date'] = $cf2_class_date;
    $tempArray[$time]['cf2_class_time'] = $cf2_class_time;
    $tempArray[$time]['cf2_pay_amt'] = $cf2_pay_amt;
    $tempArray[$time]['cf2_msg'] = $cf2_msg;
    
    save($tempArray, "../../db_conn/".$db_table2."_data.json"); 
    
} elseif (isset($_POST['entry_1106559346'])) {
    $cf3_fname = $_POST['entry_1106559346'];
    $cf3_lname = $_POST['entry_495185894'];
    $cf3_phone = $_POST['entry_612102057'];
    $cf3_email = $_POST['entry_1720717042'];
    $cf3_class_date = $_POST['entry_1311224909'];
    $cf3_class_time = $_POST['entry_989253697'];
    $cf3_cna_stat = $_POST['entry_39817019'];
    $cf3_msg = $_POST['entry_1918079305'];

    echo("first name: $cf3_fname<br>");
    //print_r($_POST);
    
    // insert values in table 3
    $query6 = "INSERT INTO $db_table3 ($table3_col1, $table3_col2, $table3_col3, $table3_col4, $table3_col5, $table3_col6, $table3_col7, $table3_col8, $table3_col9, $table3_col10) VALUES (0, '$datetime', '$cf3_fname', '$cf3_lname', '$cf3_phone', '$cf3_email', '$cf3_class_date', '$cf3_class_time', '$cf3_cna_stat', '$cf3_msg')";
    $query6_result = mysqli_query($db_conn, $query6);

    // Check values in table 3
    if($query6_result) {
        echo("QUERY 6 SUCCESSFUL<br>");
    } else {
        echo "QUERY 6 Error: ".mysqli_error($db_conn)."<br>";
    }

    // Store in JSON file
    $data = $_POST; // Store data array
    print_r($data);

    $contents = file_get_contents("../../db_conn/".$db_table3."_data.json");
    $tempArray = json_decode($contents, 1); // 1 for ASSOC = TRUE
    //array_push($tempArray, $data);
    $time = time();
    $tempArray[$time]['cf3_fname'] = $cf3_fname; // PHP requires "." in $_POST to be "_"
    $tempArray[$time]['cf3_lname'] = $cf3_lname;
    $tempArray[$time]['cf3_phone'] = $cf3_phone;
    $tempArray[$time]['cf3_email'] = $cf3_email;
    $tempArray[$time]['cf3_class_date'] = $cf3_class_date;
    $tempArray[$time]['cf3_class_time'] = $cf3_class_time;
    $tempArray[$time]['cf3_cna_stat'] = $cf3_cna_stat;
    $tempArray[$time]['cf3_msg'] = $cf3_msg;
    
    save($tempArray, "../../db_conn/".$db_table3."_data.json"); // ../js/
 
} elseif (isset($_POST['entry_1660600340'])) {
    $cf4_fname = $_POST['entry_1660600340'];
    $cf4_lname = $_POST['entry_635972232'];
    $cf4_phone = $_POST['entry_2114187606'];
    $cf4_email = $_POST['entry_1711077076'];
    $cf4_class_date = $_POST['entry_1970185111'];
    $cf4_class_time = $_POST['entry_1005305497'];
    $cf4_cna_stat = $_POST['entry_1109730785'];
    $cf4_msg = $_POST['entry_396924594'];

    echo("first name: $cf4_fname<br>");
    //print_r($_POST);
    
    // insert values in table 4
    $query6 = "INSERT INTO $db_table4 ($table4_col1, $table4_col2, $table4_col3, $table4_col4, $table4_col5, $table4_col6, $table4_col7, $table4_col8, $table4_col9, $table4_col10) VALUES (0, '$datetime', '$cf3_fname', '$cf3_lname', '$cf3_phone', '$cf3_email', '$cf2_class_date', '$cf2_class_time', '$cf2_cna_stat', '$cf2_msg')";
    $query6_result = mysqli_query($db_conn, $query6);

    // Check values in table 4
    if($query6_result) {
        echo("QUERY 6 SUCCESSFUL<br>");
    } else {
        echo "QUERY 6 Error: ".mysqli_error($db_conn)."<br>";
    }

    // Store in JSON file
    $data = $_POST; // Store data array
    print_r($data);

    $contents = file_get_contents("../../db_conn/".$db_table4."_data.json");
    $tempArray = json_decode($contents, 1); // 1 for ASSOC = TRUE
    //array_push($tempArray, $data);
    $time = time();
    $tempArray[$time]['cf4_fname'] = $cf4_fname; // PHP requires "." in $_POST to be "_"
    $tempArray[$time]['cf4_lname'] = $cf4_lname;
    $tempArray[$time]['cf4_phone'] = $cf4_phone;
    $tempArray[$time]['cf4_email'] = $cf4_email;
    $tempArray[$time]['cf4_class_date'] = $cf4_class_date;
    $tempArray[$time]['cf4_class_time'] = $cf4_class_time;
    $tempArray[$time]['cf4_cna_stat'] = $cf4_cna_stat;
    $tempArray[$time]['cf4_msg'] = $cf4_msg;
    
    save($tempArray, "../../db_conn/".$db_table4."_data.json");
}

//mysqli_close($db_conn);
?>  