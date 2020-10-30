<?php
require('../model/database.php');

// Check connection
if (mysqli_connect_errno ( $con )) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error ()."<br>";
    exit("Connect Error");
}
else echo '' . '<br/>';

// creating the delete button to remove records
if (! empty($_POST['productCode'])) {
    $productID = $_POST['productCode'];
    $query = "DELETE FROM products WHERE productCode='$productID';";
    $result = mysqli_query($con, $query);
}

// Perform SQL query
$query = "SELECT * FROM products;";
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
    echo "<form method='POST' action='index.php'>";
    // inner loop. Print each field value for a result set record
    foreach ($line as $key => $value) {
        echo "<td class='tableData'><input type='text' value='" . $value . "' name='" . $key . "'/></td>";
    }
    
    // put delete button on form
    echo "<td class='deleteButton'><input type='submit' value='delete' name='foo'/></td></tr>";
    echo "</form>";
} // end while

echo "</table>";

// close connection
mysqli_close ($con);

?>