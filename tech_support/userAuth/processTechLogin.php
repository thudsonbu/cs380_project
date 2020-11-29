<?php

require '../session/sessionConfig.php'; // required for session to be accessed (set variables)
require '../model/testInput.php'; // test_input() used to test for html injection
require '../session/getTechLogin.php'; // getAdminLogin() used as prepared statement function

// check if all credentials were filled in
if( !empty($_POST['techUser']) and !empty($_POST['techPass'])) {
    // grab user info
    $username = $_POST['techUser'];
    $password = $_POST['techPass'];
    // test user input for html injection
    if(testHTMLInj($username) or testHTMLInj($password)){
        header('Location:./techLoginPage.php?error=HTML INJECTION DETECTED');
    }
    // use prepared statement to fetch admin
    $loginResponse = getTechLogin($username, $password);

    if($loginResponse[1]){ // database error

        $errorMessage = $loginResponse[1]->getMessage();
        header("Location: techLoginPage.php?=$errorMessage");

    } else if(empty($loginResponse[0])){ // admin was not found

        header("Location:techLoginPage.php?=Invalid Credentials");

    } else { // admin was found

        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $password;
        // general variables
        $_SESSION['logged_in'] = true; // you have logged in
        $_SESSION['last_activity'] = time(); // sets the time of last activity to now
        $_SESSION['expire_time'] = 30; // expire time
        // session permission level
        $_SESSION['permission'] = 'tech';
        header("Location: ../menuPage.php");
    }

} else { // reject due to user or pass missing

    header('Location:./techLoginPage.php?error=Invalid Credentials');
}