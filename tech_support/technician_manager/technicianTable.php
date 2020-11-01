<?php

require('../model/database.php');
require('../model/queryHandler.php');

// Perform SQL query
$query = "SELECT * FROM technicians;";

$out = queryHandler($con, $query);

// if there waas an error report the error
if($out[1]) {

    require "../errors/errorMessage.php";

    errorMessage($out[1]);

} else if(empty($out[0])) { //no results were returned

    echo "<p class='message'>No Results Found</p>";

} else {

    $result = $out[0];

    // loop over for headers
    echo "<table class = 'peopleTable'><tr class= 'tableHeaderRow'>";

    $fields = mysqli_fetch_fields($result);

    foreach ($fields as $field){

        echo "<th class='tableHeader'> $field->name</th>  ";
    }
    echo "</tr>";

    // table column header done, now loop over result set.
    // Create a form for each record in result set.
    // Print field values for each record
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        echo "<tr class= 'tableHeaderRow'>";
        // inner loop. Print each field value for a result set record
        foreach ($line as $key => $value) {

            echo "<td class='tableData'>", "$value", "</td>";
        }
        
        // put delete button on form
        echo "<td><a class='button red' href='delete.php?did=".$line['techID']."'>Delete</a></td>"  ;
    } // end while

    echo "</table>";

}

// close connection
mysqli_close ($con);

?>