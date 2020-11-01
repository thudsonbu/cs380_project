<?php
// database (returns connection $con)
require('../model/database.php');

// if the delete was succesful the did superglobal will be set
if(isset($_GET['did'])) {

    // clear the string of any invalid characters
    $delete_id = $con->real_escape_string($_GET['did']);

    // build delete query
    $query = "DELETE FROM technicians WHERE techID='$delete_id';";

    // make query with connection
    $result = mysqli_query($con, $query);

    // if the query was succesful (returns result) render index.php else render error
    if($query) {
        require "index.php";
    } else {
        echo "ERROR";
    }
}
?>