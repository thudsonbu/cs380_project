<?php
require '../session/sessionConfig.php';
require '../model/postRegister.php';

$date = date("Y-m-d");
$customerID = $_SESSION['id'];
$productCode = $_POST['productCode'];


$registerResponse = postRegister($customerID, $productCode, $date);




if($registerResponse[1]){ // error in customer query
    
    $error = $registerResponse[1]->getMessage();
    header("Location: confirm.php?error=$error");
    
} else if(empty($registerResponse[0])){ // no error but no results returned from customer query
    
    header("Location: confirm.php?error='No Product Code Registered'");
    
} else { // IF NO ERROR AND RESULTS CREATE TABLE
    
    header("Location: confirm.php?message='Registered Product Code: '$productCode'");
}

?>