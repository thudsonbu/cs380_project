<?php

// This will check if the delete id was set (dProd is the delete id)
require "../model/postHandler.php";

if(isset($_GET['dProd'])) {
    
    // clear the string of any invalid characters
    $delete_id = $_GET['dProd'];
    
    // build delete query
    $query = "DELETE FROM products WHERE productCode='$delete_id';";
    
    $outarray = post($query);
    
    // if the query was succesful (returns result) render index.php else render error
    if(!empty($outarray[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
        
        $error = $outarray[1]->getMessage();
        
        header("Location: index.php?error=$error");
        
    } else if(!$outarray[0]) { // No messages but no records effected
        
        $rowCount = $outarray[0];
        
        header("Location: index.php?error='$rowCount Product Deleted'");
        
    } else {
        
        $rowCount = $outarray[0];
        
        header("Location: index.php?message='$rowCount Product Deleted '");
    }
}

?>
    
