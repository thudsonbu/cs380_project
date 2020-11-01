<?php

// Select query takes a connection ($con) and a query string ($query) and
// performs the query while handling any errors that may occur.
// The query result is returned (null if failure or no result) and the 
// error object if there was one

function queryHandler($query){

    // allow MySQLi error reporting and Exception handling
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // attempt database connection
    try {
        require "connectionVariables.php";

        $con = mysqli_connect($host, $username, $password, $dbname);

    } catch(Exception $e) {
        
        return [null, $e];
    }
    
    // if database connection, attempt query
    if(isset($con)){

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

    mysqli_close($con);
}