<?php
require "../model/postHandler.php";


if (empty($_POST['first']) or empty($_POST['last']) or empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['pass'])) throw new Exception("form fields not filled in");


$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];

// test name for HTML characters to avoid HTML Injection
require ("TestInput.php");
$first = test_input($first);
$last = test_input($last);
$email = test_input($email);
$phone = test_input($phone);
$pass = test_input($pass);

// Perform SQL query
$query = "INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES('$first', '$last', '$email', '$phone', '$pass')";

$out = post($query);

if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
    
    $error = $out[1]->getMessage();
    
    header("Location: index.php?error=$error");
    
} else if(!$out[0]) { // No errors but no records affected
    
    $rowCount = $out[0];
    
    header("Location: index.php?error='$rowCount Rows Updated'");
    
} else {
    
    $rowCount = $out[0];
    
    header("Location: index.php?message='$rowCount Rows Updated'");
}


?>