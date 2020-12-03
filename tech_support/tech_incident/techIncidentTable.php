<?php


// if there waas an error report the error
if($out[1]) {
    
    require "../messages/errorMessage.php";
    
    errorMessage($out[1]);
    
} else if(empty($out[0])) { //no results were returned
    
    echo "<p class='message'>There are no open incidents for this technician.</p>";
    echo" <th class='tableHeader'>
        <a class='button green' href='index.php'>Refresh List of Incidents</a>
    </th>";
    
} else {
    
    $result = $out[0];

    $user = $_SESSION['user'];
    
    // loop over for headers
    echo "<table class = 'peopleTable'>
        
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>Open Incidents</div>
    </div>

    <div class='sectionTitleContainer'>You are logged in as $user.</div>
        
    <tr class= 'tableHeaderRow'>";
    
    $fields = mysqli_fetch_fields($result);
    
    foreach ($fields as $field){
        
        echo "<th class='tableHeader'> $field->name</th>  ";
    }
    
    echo" 
    <th class='tableHeader'>
        <a class='button blue' href='index.php'>Refresh</a>
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
        
        // put close button on form
        echo "<td class='tableData'><a class='button green' href='close.php?closeID=".$line['incidentID']."'>Close</a></td>"  ;
    } // end while
    
    echo "</table>";
    
}

?>