<?php

// Select query takes a connection ($con) and a query string ($query) and
// performs the query while handling any errors that may occur.
// The query result is returned (null if failure or no result) and a boolean
// representing if an error has occured

function selectQuery($con, $query){

    $fields = null;

    try {
        $result = mysqli_query($con, $query);

        $rows = mysqli_num_rows($result);

        if($rows < 1) {
            
            return [null, false];

        } else {

            return [$result, false];
        }

    } catch(Exception $e) {
        
        return [null, true];
    }
}