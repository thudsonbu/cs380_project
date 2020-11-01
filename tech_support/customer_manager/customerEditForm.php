<?php

//database connection and query
require "../model/queryHandler.php";

// get the email of the customer that was selected
$email = $_GET['email'];

// find the customer in the datbase and get customer data
$query = "SELECT * FROM customers WHERE email='$email'"; 

// query the database
$out = queryHandler($query);

if($out[1]){ // IF ERROR ( query returns array with result and boolean error )

    require "../errors/errorMessage.php";

    errorMessage($out[1]);

} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS

    echo "<p class='message'>No Results Found</p>";

} else { // IF NO ERROR AND RESULTS CREATE TABLE

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
    $result = $out[0];
    $fields = mysqli_fetch_fields($result);
    $line = mysqli_fetch_array($result,  MYSQLI_ASSOC);

    // print fields as form inputs from customer
    foreach ($fields as $field){

        $field_name = $field->name;

        // do not include customer id in the form
        if ($field_name == 'customerID'){
            continue;
        };

        $field_value = $line[$field_name];

        // add row to form
        echo "
        <div class='formEntry'>
            <div class='fieldName'>$field->name</div>
            <input class='fieldInput' type='text' name='$field->name' value='$field_value'>
        </div>
        ";
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