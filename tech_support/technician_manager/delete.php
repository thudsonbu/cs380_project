<?php
// if this will check if the delete id was set (did is the delete id)
require "../model/postHandler.php";
require "../model/deleteTech.php";

if(isset($_GET['did'])) {

    $delete_id = $_GET['did'];

    // build delete query
    $techResponse = deleteTech($delete_id);  
    
    // if the query was succesful (returns result) render index.php else render error
    if($techResponse[1]){ // error in customer query
        
        require "../errors/errorMessage.php";
        
        errorMessage($techResponse[1]);
        
    } else if(empty($techResponse[0])) { // No errors but no records effected
        
        header("Location: index.php?message='Technician Deleted'");
        
    } else {
        
        header("Location: index.php?error='Technician Deleted '");

    }
}
?>