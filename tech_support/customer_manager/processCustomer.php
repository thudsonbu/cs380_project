<?php

// get database connection
require "../model/database.php";

// put/post query
require "../model/insertQuery.php";

// build query start
$query = "UPDATE Customers SET ";

// for each value in _post append to query
foreach($_POST as $key => $value) {

    // ingore adding the customer id
    if($key == 'customerID'){
        continue;
    }

    $query = $query . $key . "='" . $value ."', ";
}

// get the customer id from super global
$email = $_POST['email'];

// remove the , from the query with substr (this causes sytax error)
$query = substr($query, 0, -2) . " WHERE email='$email';"; 

$out = insertQuery($con, $query);

// if succesful return to index and say it worked

if(!empty($out[1])){ // IF ERROR ( selectQuery returns array with result and boolean error )

    $error = $out[1]->getMessage();

    header("Location: index.php?message=$error");

} else { // IF NO ERROR MUST HAVE BEEN ADDED

    header("Location: index.php?message=Updated Succesfully");
}

// CLOSE CONNECTION
mysqli_close($con); 

// if failure return to customer form and say failure reason