<?php
session_start();
require '../model/getHandler.php';
$date = date("Y-m-d");


$productName = $_POST['productName'];
$query = "SELECT productCode FROM products WHERE name='$productName';";
$out = get($query);
if($out[1]){ // IF ERROR ( query returns array with result and boolean error )
    require "../errors/errorMessage.php";
    errorMessage($out[1]); // show an error message box
} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS
    require "../errors/message.php";
    message("Sorry, your credentials is invalid");
} else { // IF NO ERROR AND RESULTS CREATE TABLE
    $result = $out[0];
    while ($value = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        // inner loop. Print each table field value for a record
        foreach ($value as $productCode) {
            $productCode = "$productCode";
        }
    }
}


$email = $_SESSION['email'];
$query = "SELECT customerID FROM customers WHERE email='$email' AND email IS NOT NULL;";
$out = get($query);
if($out[1]){ // IF ERROR ( query returns array with result and boolean error )
    require "../errors/errorMessage.php";
    errorMessage($out[1]); // show an error message box
} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS
    require "../errors/message.php";
    message("Sorry, your credentials is invalid");
} else { // IF NO ERROR AND RESULTS CREATE TABLE
    $result = $out[0];
    while ($value = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        foreach ($value as $customerID) {
            $customerID = "$customerID";
    }
}
}

//echo "$productCode";
//echo "$productName";
//echo "$date";
//echo "$customerID";


require '../model/postHandler.php';
$query = "REPLACE INTO registrations VALUES ('$customerID', '$productCode', '$date');";
post($query);
$out = post($query);


// if the query was succesful (returns result) render index.php else render error
if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
    $error = $out[1]->getMessage();
    header("Location: confirm.php?error=$error");
} else if(!$out[0]) { // No errors but no records effected
    $rowCount = $out[0];
    header("Location: confirm.php?error='No Product Code Registered'");
} else {
    $rowCount = $out[0];
    header("Location: confirm.php?message='Registered Product Code: '$productCode'");
}
?>