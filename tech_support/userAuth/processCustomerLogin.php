<?php

require '../session/sessionConfig.php'; // required for session to be accessed (set variables)
require '../model/testInput.php'; // test_input() used to test for html injection
require '../session/getCustomerLogin.php'; // getAdminLogin() used as prepared statement function

// check if all credentials were filled in
if( !empty($_POST['customerUser'])) {
    // grab user info
    $username = $_POST['customerUser'];
    // test user input for html injection
    if(testHTMLInj($username)){
        header('Location:./techLoginPage.php?error=HTML INJECTION DETECTED');
    }
    // use prepared statement to fetch admin
    $loginResponse = getCustomerLogin($username);

    if($loginResponse[1]){ // database error

        $errorMessage = $loginResponse[1]->getMessage();
        header("Location: customerLoginPage.php?error=$errorMessage");

    } else if(empty($loginResponse[0])){ // admin was not found

        header("Location:customerLoginPage.php?error=Invalid Credentials");

    } else { // admin was found

        $_SESSION['user'] = $username;
        // general variables
        $_SESSION['logged_in'] = true; // you have logged in
        $_SESSION['last_activity'] = time(); // sets the time of last activity to now
        $_SESSION['expire_time'] = 30; // expire time
        // session permission level
        $_SESSION['permission'] = 'customer';
        header("Location: ../menuPage.php");
    }

} else { // reject due to user or pass missing

    header('Location:./customerLoginPage.php?error=Invalid Credentials');
}