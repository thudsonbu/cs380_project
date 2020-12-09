<?php

function newCustomer(
        $firstName,
        $lastName,
        $address,
        $city,
        $state,
        $postalCode,
        $countryCode,
        $phone,
        $email,
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
            
            $query = mysqli_prepare($con, "INSERT INTO Customers
                (firstName, lastName, address, city, state, 
                 postalCode, countryCode, phone, email, password) VALUES (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )
        ");
            mysqli_stmt_bind_param($query, "ssssssssss",
                $firstName,
                $lastName,
                $address,
                $city,
                $state,
                $postalCode,
                $countryCode,
                $phone,
                $email,
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