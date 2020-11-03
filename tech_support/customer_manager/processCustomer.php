<?php

// put/post query
require "../model/postHandler.php";
require "../model/testInput.php";

// build query start
$query = "UPDATE Customers SET ";
$htmlInjection = false;

// for each value in _post append to query and test for html injection
foreach($_POST as $key => $value) {

    if(testInput($value)){

        $htmlInjection = true;
    }

    $query = $query . $key . "='" . $value ."', ";
}

if(!$htmlInjection) {

    // get the customer id from super global
    $email = $_POST['email'];

    // remove the , from the query with substr (this causes sytax error)
    $query = substr($query, 0, -2) . "WHERE email='$email'"; 

    $out = post($query);

    // if succesful return to index and say it worked

    if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )

        $error = $out[1]->getMessage();

        header("Location: index.php?error=$error");

    } else if(!$out[0]) { // No errors but no records effected

        $rowCount = $out[0];

        header("Location: index.php?error='$rowCount Rows Updated'");

    } else {

        $rowCount = $out[0];

        header("Location: index.php?message='$rowCount Rows Updated'");
    }
} else {

    header("Location: customerFormPage.php?error='HTML INJECTION DETECTED");
}



// CLOSE CONNECTION
mysqli_close($con); 

// if failure return to customer form and say failure reason