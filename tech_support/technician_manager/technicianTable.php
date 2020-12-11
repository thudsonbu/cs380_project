<?php

// DATABASE, QUERY AND CUSTOMER TABLE CREATOR
require "../model/getHandler.php";

$out = get($query);

// if there waas an error report the error
if($out[1]) {

    require "../messages/errorMessage.php";

    errorMessage($out[1]);

} else if(empty($out[0])) { //no results were returned

    echo "<p class='message'>No Results Found</p>";
    echo" <th class='tableHeader'>
        <a class='button green' href='newTech.php'>Add a Technician</a>
    </th>";

} else {

    $result = $out[0];

    // loop over for headers
    echo "<table class = 'peopleTable'>
    
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>Technicians</div>
    </div>
    
    <tr class= 'tableHeaderRow'>";

    $fields = mysqli_fetch_fields($result);

    foreach ($fields as $field){

        echo "<th class='tableHeader'> $field->name</th>  ";
    }

    echo" <th class='tableHeader'> 
        <a class='button green' href='newTech.php'>New</a>   
    </th>";

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

        $techID = $line['techID'];
        
        // put delete button on form
        echo "<td><a class='button red' style='color: white' name='$techID' onclick='deleteTech()'>Delete</a></td>";
    } // end while

    echo "</table>";

}

?>