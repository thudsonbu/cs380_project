<?php

require('../model/database.php');
require('../model/queryHandler.php');

// Perform SQL query
$query = "SELECT * FROM customers WHERE email = '$email';";

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
    echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>Register Product</div>
    </div>";
        
    // Create a form for each record in result set.
    // Print field values for each record
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo 'Customer:     ';
        echo $row['firstName'];
        echo ' ';
        echo $row['lastName'];
        }
     } // end while
  
// close connection
mysqli_close ($con);

?>