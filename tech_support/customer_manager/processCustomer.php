<?php

// put/post query
require "../model/postCustomer.php";
require "../model/testInput.php";

// build query start
$query = "UPDATE Customers SET ";
$htmlInjection = false;

$customerID = $_POST['customerID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$postalCost = $_POST['postalCode'];
$countryCode= $_POST['countryCode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

// for each value in _post append to query and test for html injection
foreach($_POST as $key => $value) {

    if(testInput($value)){

        $htmlInjection = true;
    }
}

if(!$htmlInjection) {

    // // remove the , from the query with substr (this causes sytax error)
    // $query = substr($query, 0, -2) . "WHERE customerID='$customerID'"; 

    $out = postCustomer(
        $firstName,
        $lastName,
        $address,
        $city,
        $state,
        $postalCode,
        $countryCode,
        $phone,
        $email,
        $password,
        $customerID
    );

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