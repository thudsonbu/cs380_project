<?php
require '../model/sessionConfig.php';

require '../model/getCustomerLogin.php';


// Grab User submitted information

$_SESSION['email'] = $_POST['login'];
$email = $_SESSION['email'];

require ("../model/testInput.php");
//$email = testInput($email);

$loginResponse = getCustomerLogin($email);


if($loginResponse[1]){ // error in customer query
    
    unset($_SESSION["email"]);
    require 'lockOut.php';
    
} else if(empty($loginResponse[0])){ // no error but no results returned from customer query
    
    unset($_SESSION["email"]);
    require "lockout2.php";
    
} else { // IF NO ERROR AND RESULTS CREATE TABLE
    $loginResponse = $loginResponse[0];
    $line = mysqli_fetch_array($loginResponse,  MYSQLI_ASSOC);if(is_array($line)) {
        $_SESSION["first"] = $line['firstName'];
        $_SESSION["last"] = $line['lastName'];
        $_SESSION["id"] = $line['customerID'];
        
        header("Location:account.php");
    }
}
   

        

?>    