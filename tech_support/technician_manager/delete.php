<?php
// if this weill check if the delete id was set (did is the delete id)
require "../model/postHandler.php";

if(isset($_GET['did'])) {

    // clear the string of any invalid characters
    $delete_id = $_GET['did'];

    // build delete query
    $query = "DELETE FROM technicians WHERE techID='$delete_id';";

    $out = post($query);
    
    
    // if the query was succesful (returns result) render index.php else render error
    if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
        
        $error = $out[1]->getMessage();
        
        header("Location: index.php?error=$error");
        
    } else if(!$out[0]) { // No errors but no records effected
        
        $rowCount = $out[0];
        
        header("Location: index.php?error='$rowCount Technicians Deleted'");
        
    } else {
        
        $rowCount = $out[0];
        
        header("Location: index.php?message='$rowCount Technician Deleted '");
    }
}

?>