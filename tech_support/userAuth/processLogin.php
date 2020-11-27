<?php
//begin the session
require '../session/sessionConfig.php';
require 'validateLogin.php';

//Determine if the user is an admin
if (!empty($_POST["adminUser"]) and !empty($_POST["adminPass"])) {
    
    // Grab User submitted information and assign to session
    $_SESSION['user'] = $_POST['adminUser'];
    $_SESSION['pass'] = $_POST['adminPass'];
    
    //!!do we want to test the input at all here??
    
    //Begin authentication of credentials.
    require '../session/getAdminLogin.php';
    $loginResponse = getAdminLogin($_SESSION['user'], $_SESSION['pass']);
    
    //confirm credentials are in database
    $loginResponse = testLogin($loginResponse);
    
    //pull specific information from query
    $line = mysqli_fetch_array($loginResponse,  MYSQLI_ASSOC);if(is_array($line)) {
        $_SESSION["first"] = $line['username'];
             
        //establish permission as type admin
        $_SESSION['permission'] = "admin";
        
        //display index page
        header("Location:../homepage.php");
        
    }
//Determine if the user is a technician
} elseif (!empty($_POST["techEmail"]) & !empty($_POST["techPass"])){
    
    // Grab User submitted information and assign to session
    $_SESSION['user'] = $_POST['techEmail'];
    $_SESSION['pass'] = $_POST['techPass'];
    
    //hi tom do we want to test input here?
    
    //Begin authentication of credentials
    require '../session/getTechLogin.php';
    $loginResponse = getTechLogin($_SESSION['user'], $_SESSION['pass']);

    //confirm credentials are in database
    $loginResponse = testLogin($loginResponse);
    
    //pull specific information from query
    $line = mysqli_fetch_array($loginResponse,  MYSQLI_ASSOC);if(is_array($line)) {
        $_SESSION["first"] = $line['firstName'];
        $_SESSION['techID'] = $line['techID'];
        
        //establish permission as type tech
        $_SESSION['permission'] = "tech";
        
        //display incident page page THIS IS A PLACEHOLDER
        header("Location:../technician_manager/index.php");
        
    }
//Determine if the user is a customer
} elseif (!empty($_POST["custEmail"])){
    
    // Grab User submitted information and assign to session
    $_SESSION['user'] = $_POST['custEmail'];
    
    //hi tom do we want to test input here?
    
    //Begin authentication of credentials
    require '../session/getCustomerLogin.php';
    $loginResponse = getCustomerLogin($_SESSION['user']);

    //confirm credentials are in database
    $loginResponse = testLogin($loginResponse);
    
    //pull information from query
    $line = mysqli_fetch_array($loginResponse,  MYSQLI_ASSOC);if(is_array($line)) {
        $_SESSION["first"] = $line['firstName'];
        $_SESSION["last"] = $line['lastName'];
        $_SESSION["id"] = $line['customerID'];
        
        //establish permission as type customer
        $_SESSION['permission'] = "customer";
        
        //display register products page
        header("Location:../register_product/account.php");
        
    }
}

?>    