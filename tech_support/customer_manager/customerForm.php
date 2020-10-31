<?php

//database connection and query
require "../model/database.php";
require "../model/selectQuery.php";

$email = $_GET['email'];

$query = "SELECT firstname, lastname, address, city, state, postalcode
countrycode, phone, email FROM customers WHERE email='$email'";

$out = selectQuery($con, $query);

if($out[1]){ // IF ERROR ( selectQuery returns array with result and boolean error )

    echo "Query Error";

} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS

    echo "No Results Found";

} else { // IF NO ERROR AND RESULTS CREATE TABLE

    echo "<form action='processCustomer.php' method='post' class='form'>";

    echo "
    <div class='formTitleContainer'>
        <div class='formTitle'>
            Update Customer Information
        </div>
    </div>
    ";

    $result = $out[0];
    $fields = mysqli_fetch_fields($result);
    $line = mysqli_fetch_array($result,  MYSQLI_ASSOC);

    $loc = 0;
    foreach ($fields as $field){

        $field_name = $field->name;

        $field_value = $line[$field_name];

        echo "
        <div class='formEntry'>
            <div class='fieldName'>$field->name</div>
            <input class='fieldInput' type='text' name='$field->name' value='$field_value'>
        </div>
        ";

        $loc += 1;

    }

    echo "
    <div class='buttonContainer'>
        <a href='index.php' class='button button-small grey'>Cancel</a>
        <button type='submit' class='button button-small green'>Update Customer</button>
    </div>
    ";

    echo "</form>";

}

// CLOSE CONNECTION
mysqli_close($con);