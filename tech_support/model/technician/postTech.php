<?php

/*
 The post method takes a sql query string and performs the query
 on the database. The method returns an array of two elements. The first
 element in the array is the number of rows affected by the query. The
 second element is the error object if there was one (null otherswise);
 
 Database connection and querry messages will be handled by this method however
 it is up to the user to implement what should happen should an error be returned.
 */

function postTech(
    $first,
    $last,
    $email,
    $phone,
    $pass
    ){
        
        // allow MySQLi error reporting and Exception handling
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        // attempt database connection
        try {
            require "../model/connectionVariables.php";
            
            $con = mysqli_connect($host, $username, $password, $dbname);
            
        } catch(Exception $e) {
            
            return [0, $e];
        }
        
        // if database connection, attempt deletion
        if($con) {
            
            try {
                
                $query = mysqli_prepare($con, "INSERT INTO technicians 
                                                    (firstName, lastName, email, phone, password) 
                                                    VALUES(?, ?, ?, ?, ?)");
                
                mysqli_stmt_bind_param($query, "sssss",
                    $first,
                    $last,
                    $email,
                    $phone,
                    $pass
                );
                
                mysqli_stmt_execute($query);
                $result = mysqli_stmt_get_result($query);
                
                $rowCount = $con->affected_rows;
                
                return [$rowCount, null];
                
            } catch(Exception $e) {
                
                return [0, $e];
            }
        }
        
        mysqli_close($con);
}