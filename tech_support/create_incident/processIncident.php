<?php
// GET TITLE AND DESCRIPTION FROM POST REQUEST
$title = $_POST['titleName'];
$description = $_POST['description'];
$customerID = $_POST['customerID'];
$productCode = $_POST['productCode'];

// TEST INPUT
require "../model/testInput.php";
// TEST INPUT FOR HTML INJECTION
$titleInjection = testHTMLInj($title);
$descInjection = testHTMLInj($description);
if($titleInjection || $descInjection){
    header("Location: incidentFormPage.php?error=HTML INJECTION FOUND");
    exit();
}

// SEND POST REQUEST
$currentDate = date("Y-m-d H:i:s");
require '../model/postIncident.php';
$out = postIncident($customerID,$productCode,null, $currentDate, null, $title, $description);
$error = $out[1];
$result = $out[0];

// HANDLE QUERY RESULT
if($error){
    $errorMessage = $error->getMessage();
    header( "Location: incidentFormPage.php?error=$errorMessage");
    exit();
} elseif ($result){
    $noResult = 'No update made.';
    header( "Location: incidentFormPage.php?message=$noResult");
    exit();
} else {
    $line = mysqli_fetch_array($result,  MYSQLI_ASSOC);
    $customerName = $line['Name'];
    $customerEmail = $line['email'];
    header("Location: index.php?success=Incident Added to Database");
}