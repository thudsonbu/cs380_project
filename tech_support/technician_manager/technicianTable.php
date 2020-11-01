<?php
require('../model/database.php');

// Perform SQL query
$query = "SELECT * FROM technicians;";
$result = mysqli_query($con, $query) or  die('Query failed: ' . mysqli_errno($con));

// loop over for headers
echo "<table class = 'peopleTable'><tr class= 'tableHeaderRow'>";
$finfo = mysqli_fetch_fields($result);

foreach ($finfo as $val){
    echo "<th class='tableHeader'> $val->name</th>  ";
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
    echo "<td class = deleteButton><a href='delete.php?did=".$line['techID']."'>Delete</a></td>"  ;
} // end while

echo "</table>";

// close connection
mysqli_close ($con);

?>