<?php
require('../model/database.php');


if(isset($_GET['did'])) {
    $delete_id = $con->real_escape_string($_GET['did']);
    $query = "DELETE FROM technicians WHERE techID='$delete_id';";
    $result = mysqli_query($con, $query);
    if($query) {
        require "index.php";
    } else {
        echo "ERROR";
    }
}
?>