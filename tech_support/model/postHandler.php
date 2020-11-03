<?php

/* 
The post method takes a sql query string and performs the query
on the database. The method returns an array of two elements. The first 
element in the array is the number of rows affected by the query. The
second element is the error object if there was one (null otherswise);

Database connection and querry errors will be handled by this method however
it is up to the user to implement what should happen should an error be returned. 
*/

function post($query){

    // allow MySQLi error reporting and Exception handling
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // attempt database connection
    try {
        require "connectionVariables.php";

        $con = mysqli_connect($host, $username, $password, $dbname);

    } catch(Exception $e) {
        
        return [0, $e];
    }
    
    // if database connection, attempt deletion
    if($con) {

        try {

            $success = mysqli_query($con, $query);

            $rowCount = $con->affected_rows;

            return [$rowCount, null];
            
        } catch(Exception $e) {
            
            return [0, $e];
        }
    }

    mysqli_close($con);
}