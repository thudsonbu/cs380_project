<?php 

require '../session/sessionConfig.php';

if($_SESSION['permission']=='customer') {
    
    require 'account.php';
    
} else {

    header('Location: ../userAuth/customerLoginPage.php');
}
?>

