<?php

// Select query takes a connection ($con) and a query string ($query) and
// performs the query while handling any errors that may occur.
// The query result is returned (null if failure or no result) and the 
// error object if there was one

function queryHandler($con, $query){

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