<?php

// get database connection
require "../model/database.php";

// put/post query
require "../model/insertQuery.php";

// build query start
$query = "INSERT INTO Customers VALUES (";

// for each value in _post append to query
foreach($_POST as $key => $value) {

    $query = $value . ", ";
}

$query = ");";

$out = insertQuery($con, $query);

// if succesful return to index and say it worked

if($out[1]){ // IF ERROR ( selectQuery returns array with result and boolean error )

    echo "Query Error";

    header("Location: editCustomer.php?message='Error Could Not Update");

} else { // IF NO ERROR MUST HAVE BEEN ADDED

    createCustomerTable($out[0]);

    header("Location: index.php?message='Updated Succesfully");
}

// CLOSE CONNECTION
mysqli_close($con); 

// if failure return to customer form and say failure reason