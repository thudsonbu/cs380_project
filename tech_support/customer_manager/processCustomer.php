<?php

// put/post query
require "../model/customer/newCustomer.php";
require "../model/customer/postCustomer.php";
require "../model/testInput.php";

// passes through program using placeholder customerID ;p
if (!isset($_POST['customerID'] )) { // set error url for new customer page

    $_POST['customerID'] = "";  
    $errorUrl = "Location: newCustomerPage.php?";

} else { // set error url for edit customer page
    $errorUrl = "Location: customerFormPage.php?customerID=$customerID";
}

$customerID = $_POST['customerID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$postalCode = $_POST['postalCode'];
$countryCode= $_POST['countryCode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$inputError = false;

// for each value in _post append to query and test for html injection
foreach($_POST as $key => $value) {

    // test for html injection
    if(testHTMLInj($value)){

        if ($_POST['customerID'] === "") { // if it came from new customer form

            header("Location: newCustomerPage.php?error=HTML INJECTION DETECTED");
             
        } else { // if it came from edit customer page

            header("Location: customerFormPage.php?error=HTML INJECTION DETECTED");
        }
    
        exit();
    }

    // test for other conditions
    switch($key) {
        case 'postalCode':
            // postal code is required with between 1 and 21 characters
            if(strlen($value) > 20){
                $errorUrl = $errorUrl . '&postalCodeError=Postal code must be less then 21 characters';
                $inputError = true;
            } 
            break;
        case 'countryCode':
            break;
        case 'phone':
            // phone must be in (999) 999-9999 format
            $phonePattern = "/\(\d{3}\) +\d{3}-\d{4}$/";
            if(!preg_match($phonePattern, $value)){
                $errorUrl = $errorUrl . '&phoneError=Phone must be in (999) 999-9999 format';
                $inputError = true;
            }
        break;
        case 'email': 
            // must be a valid email address
            // $emailPattern = '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$';
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                $errorUrl = $errorUrl . '&emailError=Must be valid email';
                $inputError = true;
            } else if(strlen($value) > 50) {
                $errorUrl = $errorUrl . '&emailError=Email must be under 50 characters long';
                $inputError = true;
            }
        break;
        case 'password':
            // password must be between 20 and 6 characters in length
            if(strlen($value) > 20){
                $errorUrl = $errorUrl . '&passwordError=Password must be less then 21 characters in length';
                $inputError = true;
            } else if(strlen($value) < 4) {
                $errorUrl = $errorUrl . '&passwordError=Password must be at least 6 characters in length';
                $inputError = true;
            }
        break;
        default: 
            // all items must have less then 50 characters
            if(strlen($value) > 50){
                $errorUrl = $errorUrl . '&' . $key . 'Error=' . strtoupper($key) . ' must be less then 51 characters in length';
                $inputError = true;
            }
        break;
    }
}

if($inputError){

    header($errorUrl);

} else {

    if ($_POST['customerID'] === ""){ // new customer used if came from new cust form

        $out = newCustomer(
            $firstName,
            $lastName,
            $address,
            $city,
            $state,
            $postalCode,
            $countryCode,
            $phone,
            $email,
            $password
        ); 
    }
    else { // post customer used if came from edit customer form

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
    }

    // if succesful return to index and say it worked

    if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )

        $error = $out[1]->getMessage();

        header("Location: index.php?error=$error");

    } else if(!$out[0]) { // No messages but no records effected

        $rowCount = $out[0];

        header("Location: index.php?message=No Changes Made");

    } else {

        $rowCount = $out[0];

        header("Location: index.php?success=Customer Updated");
    }
}



// CLOSE CONNECTION
mysqli_close($con); 

// if failure return to customer form and say failure reason