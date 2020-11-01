<?php

function createCustomerTable($result) {

    // retrieve fields from query
    $fields = mysqli_fetch_fields($result);

    // open form
    echo "<table class='peopleTable'>";

    echo "<tr class='tableHeaderRow'>";

    // create table header
    foreach ($fields as $field) {

        echo "<th class='tableHeader'> $field->name </th>";
    }

    // select column of table header
    echo "<th class='tableHeader'> Select </th>";

    // end table header
    echo "</tr>";

    // for each line in the query result add a new row and print information
    while ( $line = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {

        $selectLink = "customerFormPage.php?email=";
        $loc = 0;

        // add table data row
        echo "<tr class='tableDataRow'>";

            // add table fields
            foreach ($line as $field_value) {

                // this adds the email to the select button link
                if ($loc == 2) {

                    $selectLink = $selectLink . $field_value;
                }

                // add field value
                echo "<td class='tableData'>", "$field_value", "</td>";

                $loc += 1; // keeps track of row 
            }

            // add select button
            echo "<td class='tableData'><a href='$selectLink'><button class='button blue'>Select</button></a></td>";
        
            // close table row
        echo "</tr>";
    }

    // close table
    echo "</table>";

}

?>