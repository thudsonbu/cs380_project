<?php
session_start();

require_once '../model/getHandler.php';


// Grab User submitted information
$_SESSION['email'] = $_POST['login'];
$email = $_SESSION['email'];
$query = "SELECT * FROM customers WHERE email='$email' AND email IS NOT NULL AND email != '';";

$out = get($query);

if($out[1]){ // IF ERROR ( query returns array with result and boolean error )
    
    require 'lockOut.php';
    
} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS
    
    require "lockout2.php";
    
    
} else { // IF NO ERROR AND RESULTS CREATE TABLE
    
   require 'account.php';

}
        

?>    