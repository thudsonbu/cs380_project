<?php

//database connection and query
require "../model/database.php";
require "../model/selectQuery.php";

$email = $_GET['email'];

$query = "SELECT * FROM customers WHERE email='$email'";

$out = selectQuery($con, $query);

if($out[1]){ // IF ERROR ( selectQuery returns array with result and boolean error )

    echo "Query Error";

} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS

    echo "No Results Found";

} else { // IF NO ERROR AND RESULTS CREATE TABLE

    echo "<form action='processCustomer.php' method='post' class='searchForm'>";

    $result = $out[0];
    $fields = mysqli_fetch_fields($result);
    $line = mysqli_fetch_array($result,  MYSQLI_ASSOC);

    $loc = 0;
    foreach ($fields as $field){


        echo "
        <div class='customerFormEntry'>
            $field->name<input type='text' name='$field->name' value='potato'>
        </div>
        ";

        $loc += 1;

    }

    echo "</form>";

}

// CLOSE CONNECTION
mysqli_close($con);