<?php

if($out[1]){ // IF ERROR ( query returns array with result and boolean error )
    
    require "../messages/errorMessage.php";
    
    errorMessage($out[1]); // show an error message box
    
} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS
    
    require "../messages/message.php";
    
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
    <div class='sectionTitleContainer'>";
        
    //display the desired title depending on the user navigation of the filtering options
    if ($_POST['filter'] == 'open') {
        echo "<div class='sectionTitle'>Open Incidents</div>";
    }
    if ($_POST['filter'] == 'unassigned') {
        echo "<div class='sectionTitle'>Unassigned Incidents</div>";
    }
    if ($_POST['filter'] == 'full' || empty($_POST['filter'])) {
        echo "<div class='sectionTitle'>All Incidents</div>";
    }
    
    echo "</div>";
    
    echo "<tr class='tableHeaderRow'>";
    
    // create table header
    foreach ($fields as $field) {
        
        $fieldName = $field->name;
        
        if($fieldName == 'incidentID'){ // dont display incident id field
            
            continue;
        }
        
        echo "<th class='tableHeader'> $fieldName </th>";
    }

    echo "
    <th class='tableHeader'>
        <a class='button green' href='../create_incident/index.php'>New</a>
    </th>";
    
    // end table header
    echo "</tr>";
    
    // for each line in the query result add a new row and print information
    while ( $line = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
        
        // create select link to incident edit form
        $selectLink = "incidentFormPage.php?incidentID=";
        // add row
        echo "<tr class='tableDataRow'";
        
        foreach ($fields as $field) {
            
            $fieldName = $field->name;
            $fieldValue = $line[$fieldName];
            
            if($fieldName=='incidentID'){ // dont display incident ID field
                
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