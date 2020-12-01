<?php
// if this will check if the delete id was set (did is the delete id)
require "../model/postHandler.php";
require "../model/incident/closeIncident.php";

if(isset($_GET['closeID'])) {
    
    $close_ID = $_GET['closeID'];
    
    //get current date and time
    $date = date("Y-m-d h:i:s");
    
    // build delete query
    $closeResponse = close($close_ID, $date);
    
    // if the query was succesful (returns result) render index.php else render error
    if(!empty($closeResponse[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
        
        $error = $closeResponse[1]->getMessage();
        
        header("Location: index.php?error=$error");
        
    } else if(!$closeResponse[0]) { // No messages but no records effected
        
        $rowCount = $closeResponse[0];
        
        header("Location: index.php?message=Incident Closed");
        
    } else {
        
        $rowCount = $closeResponse[0];
        
        header("Location: index.php?success=Incident Closed");
    }
}
?>