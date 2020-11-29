<?php

// GET THE EMAIL FROM THE POST REQUEST
$email = $_POST['email'];
// INCLUDE THE TEST INPUT METHOD
require "../model/testInput.php";
// TEST THE INPUT FOR HTML INJECTION (NOT SQL INJECTION)
$emailInjection = testHTMLInj($email);
// IF THERE IS HTML INJECTION SEND BACK TO HOME PAGE WITH AN ERROR MESSAGE
if($emailInjection){
    header("Location: index.php?error=HTML INJECTION DETECTED");
    exit();
}
// BUILD QUERY AND RUN QUERY
require '../model/searchCustomerEmail.php';

$out = searchCustomer($email);
$result = $out[0];
$error = $out[1];

// HANDLE QUERY RESULT
if($error){
    $errorMessage = $error->getMessage();
    header( "Location: index.php?error=$errorMessage");
    exit();
} elseif (!$result){
    $noResult = 'No results found.';
    header( "Location: index.php?message=$noResult");
    exit();
} else {
    $line = mysqli_fetch_array($result,  MYSQLI_ASSOC);
    $customerName = $line['Name'];
    $customerEmail = $line['email'];
    $customerID = $line['customerID'];
    header("Location: incidentFormPage.php?name=$customerName&email=$customerEmail&customerID=$customerID");
}

echo ".";

