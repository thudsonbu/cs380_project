<?php

// DATABASE, QUERY AND CUSTOMER TABLE CREATOR
require "../model/getHandler.php";

$out = get($query);

if($out[1]){ // IF ERROR ( query returns array with result and boolean error )

    require "../errors/errorMessage.php";

    errorMessage($out[1]); // show an error message box

} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS

    require "../errors/message.php";

    message("No results found");

} else { // IF NO ERROR AND RESULTS CREATE TABLE

    $result = $out[0];

    // retrieve fields from query
    $fields = mysqli_fetch_fields($result);

    // open form
    echo "
    <div class='tableContainer'>
    <table class='peopleTable'>";

    echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>Customers</div>
    </div>
    ";

    echo "<tr class='tableHeaderRow'>";

    // create table header
    foreach ($fields as $field) {

        $fieldName = $field->name;

        if($fieldName == 'customerID'){ // dont display customer id field

            continue;
        }

        echo "<th class='tableHeader'> $fieldName </th>";
    }

    // select column of table header
    echo "<th class='tableHeader'> Select </th>";

    // end table header
    echo "</tr>";

    // for each line in the query result add a new row and print information
    while ( $line = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {

        // create select link to custome redit form
        $selectLink = "customerFormPage.php?customerID=";
        // add row
        echo "<tr class='tableDataRow'";
        
        foreach ($fields as $field) {

            $fieldName = $field->name;
            $fieldValue = $line[$fieldName];

            if($fieldName=='customerID'){ // dont display customer ID field
                
                $selectLink = $selectLink . $fieldValue;

                echo "<td class='dontDisplay'></td>"; // not sure why this is necessary

            } else { // add table row

                echo "<td class='tableData'> $fieldValue </td>";
            }
            
        }

        // add select button
        echo "<td class='tableData'><a href='$selectLink'><button class='button blue'>Select</button></a></td>";
    
        // close table row
        echo "</tr>";
    }

    // close table
    echo "
    </table>
    </div>
    ";

}

?>