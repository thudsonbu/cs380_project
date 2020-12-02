<?php 

require '../session/sessionConfig.php';

if($_SESSION['permission'] != 'customer'){ // if they are not an admin they cannot access
    
    header('Location:../userAuth/customerLoginPage.php?error=Access Denied');
} else {

    header('Location: ../userAuth/customerLoginPage.php');
}

?>

