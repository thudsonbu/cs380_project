<?php

require "../model/database.php";

if (! empty($_POST['techID'])) {
    $techID = $_POST['techID'];
    $query = "DELETE FROM technicians WHERE techID='$techID';";
    $result = mysqli_query($con, $query);
} // end if

// Perform SQL query
$query = "SELECT * FROM technicians;";
$result = mysqli_query($con, $query);

//start echoing web page

echo "<table><tr>";

// process result set.
// first let's set table column headers.
// each table field has field name, data type and length properties.
// we only need the name
$finfo = mysqli_fetch_fields($result);
foreach ($finfo as $val) {
    echo "<th> $val->name</th>";
}
echo "</tr>";

// table column header done, now loop over result set.
// Create a form for each record in result set.
// Print field values for each record
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    echo "<tr>";
    echo "<form method='POST' action='index.php'>";
    // inner loop. Print each field value for a result set record
    foreach ($line as $key => $value) {
        echo "<td><input type='text' value='" . $value . "' name='" . $key . "'/></td>";
    }
    
    // put delete button on form
    echo "<td><input type='submit' value='delete' name='foo'/></td></tr>";
    echo "</form>";
} // end while

echo "</table>";

?>