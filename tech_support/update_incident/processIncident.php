<?php

// put/post query
require "../model/incident/postIncident.php";
require "../model/testInput.php";

$incidentID = $_POST['incidentID'];
$customerID = $_POST['customerID'];
$productCode = $_POST['productCode'];
$techID = $_POST['techID'];
$dateOpened = $_POST['dateOpened'];
$dateClosed = $_POST['dateClosed'];
$title = $_POST['title'];
$description= $_POST['description'];


$inputError = false;
$errorUrl = "Location: incidentFormPage.php?incidentID=$incidentID";



// for each value in _post append to query and test for html injection
foreach($_POST as $key => $value) {
    
    // test for html injection
    if(testHTMLInj($value)){
        
        header("Location: incidentFormPage.php?error=HTML INJECTION DETECTED");
        
        exit();
    }
}

if($inputError){
    
    header($errorUrl);
    
} else {
    
    $out = postIncident(
        $incidentID,
        $customerID,
        $productCode,
        $techID,
        $dateOpened,
        $dateClosed,
        $title,
        $description
    );
    
    // if succesful return to index and say it worked
    
    if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
        
        $error = $out[1]->getMessage();
        
        header("Location: index.php?error=$error");
        
    } else if(!$out[0]) { // No messages but no records effected
        
        $rowCount = $out[0];
        
        header("Location: index.php?message=No Changes Made");
        
    } else {
        
        $rowCount = $out[0];
        
        header("Location: index.php?success=Incident Updated");
    }
}



// CLOSE CONNECTION
mysqli_close($con);

// if failure return to incident form and say failure reason