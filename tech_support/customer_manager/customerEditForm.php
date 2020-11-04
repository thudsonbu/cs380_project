<?php

//database connection and query
require "../model/getHandler.php";

// get the email of the customer that was selected
$email = $_GET['email'];

// find the customer in the datbase and get customer data
$customerQuery = "SELECT * FROM customers WHERE email='$email'"; 

// create query for countries
$countryQuery = "SELECT * FROM countries";

// query the database for the customer
$customerResponse = get($customerQuery);

// query the database for the countries
$countryResponse = get($countryQuery);

if($customerResponse[1]){ // error in customer query

    require "../errors/errorMessage.php";

    errorMessage($customerResponse[1]);

} else if(empty($customerResponse[0])){ // no error but no results returned from customer query

    require "../errors/message.php";

    message("Customer not found");

} else if($countryResponse[1]){ // error returned from country query

    require "../errors/errorMessage.php";

    errorMessage($countryResponse[1]);

} else if(empty($countryResponse[0])){ // no error but no countries returned

    require "../errors/message.php";

    customErrorMessage("Countries Not Found");

} else { // if there were not erros and everything returned, make the table

    echo "<form action='processCustomer.php' method='post' class='form'>";

    // form title
    echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>
            Update Customer Information
        </div>
    </div>
    ";

    //  set variables from query
    $customerResult = $customerResponse[0];
    $fields = mysqli_fetch_fields($customerResult);
    $line = mysqli_fetch_array($customerResult,  MYSQLI_ASSOC);

    // print fields as form inputs from customer
    foreach ($fields as $field){

        $field_name = $field->name;
        $field_value = $line[$field_name];

        // customer id should not be displayed
        if ($field_name == 'customerID'){
            echo "
                <div class='dontDisplay'>
                    <div class='dontDisplay'>$field->name</div>
                    <input class='dontDisplay' type='text' name='$field->name' value='$field_value' required>
                </div>
            ";
        } else if($field_name == 'countryCode') { 
            // open country select
            echo "
            <div class='formEntry'>
                <div class='fieldName'>Country</div>
                <select class='inputField' name='countryCode'>
            ";
            // for each country in the country query
            $countryResult = $countryResponse[0];
            
            while($country = mysqli_fetch_array( $countryResult, MYSQLI_ASSOC )) {

                $countryCode = $country['countryCode'];
                $countryName = $country['countryName'];
                // create an option

                if($field_value==$countryCode){ // if this is the customers country make it selected

                    echo "<option value='$countryCode' selected>$countryName</option>";
                } else {

                    echo "<option value='$countryCode'>$countryName</option>";
                }
            }
            // close country select
            echo "
                </select>
            </div>
            ";

        } else {

            // add row to form
            echo "
            <div class='formEntry'>
                <div class='fieldName'>$field->name</div>
                <input class='fieldInput' type='text' name='$field->name' value='$field_value' required>
            </div>
            ";
        }

        
    }

    // form submit buttons
    echo "
    <div class='buttonContainer'>
        <a href='index.php' class='button grey'>Cancel</a>
        <button type='submit' class='button green'>Update Customer</button>
    </div>
    ";

    // end form
    echo "</form>";
}