<?php

/*
 The select method takes a sql select query string and performs the query
 on the database. The method returns an array of two elements. The first element
 in the array is the results of the query if there were any (null otherwise).
 The second element returns the error that was thrown if there was an error
 (null otherwise);
 
 Database connection and querry messages will be handled by this method however
 it is up to the user to implement what should happen should an error be returned.
 */

//create function
function getCustomerLogin($email){
    
    // allow MySQLi error reporting and Exception handling
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // attempt database connection
    try {
        require "../model/connectionVariables.php";
        
        $con = mysqli_connect($host, $username, $password, $dbname);
        
    } catch(Exception $e) {
        
        return [null, $e];
    }
    
    // if database connection, attempt query
    if($con){
        
        try {
            
            $query = mysqli_prepare($con, "SELECT * FROM customers WHERE email=? AND email IS NOT NULL AND email != ''");
            mysqli_stmt_bind_param($query, "s", $email);
            mysqli_stmt_execute($query);
            $result = mysqli_stmt_get_result($query);
            
            // if no rows are returned send back no result and no error
            if(mysqli_num_rows($result) < 1) {
                
                return [null, null];
                
            } else {
                // rows were returned so send back result and no error
                return [$result, null];
            }
            
        } catch(Exception $e) {
            
            return [null, $e];
        }
    }
    
    mysqli_close($con);
}