<?php

function testLogin($loginResponse){
    
    if($loginResponse[1]){ // error in customer query
        
        session_unset();
        require 'lockOut.php';
        
    } else if(empty($loginResponse[0])){ // no error but no results returned from customer query
        
        session_unset();
        require "lockout2.php";
        
    } else { // IF NO ERROR AND RESULTS CREATE TABLE
        $loginResponse = $loginResponse[0];
                  
            // Login time is stored in a session variable
            $_SESSION['logged_in'] = true; //set you've logged in
            $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
            $_SESSION['expire_time'] = 30; //expire time in seconds
            $_SESSION['permission'] = "admin";
            
            //return query
            return $loginResponse;
            
    }
}
?>