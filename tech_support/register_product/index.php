<?php 

require '../session/sessionConfig.php';

if($_SESSION['permission'] === 'customer'){ // if they are not a customer they cannot access
    
    header('Location: ./account.php');

} else {

    header('Location: ../userAuth/customerLoginPage.php?error=Access Denied');
}

?>

