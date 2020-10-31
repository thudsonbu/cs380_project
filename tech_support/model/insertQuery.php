<?php

function insertQuery($con, $query){

$fields = null;

try {
    $result = mysqli_query($con, $query);

    $rows = mysqli_num_rows($result);

    if($rows < 1) {
        
        return [null, null];

    } else {

        return [$result, null];
    }

} catch(Exception $e) {
    
    return [null, $e];
}
}