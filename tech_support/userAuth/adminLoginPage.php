<?php

require '../session/sessionConfig.php';

require '../view/header.php';

makeHeader('Admin Index');

//RESPONSIVE NAVBAR
require '../view/nav.php';

//PAGE TITLE
echo "
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Administrator
    </div>
</div>";

//PAGE CONTENT
echo "
<div class='sectionContainer'>
    <form action='processAdminLogin.php' method='post' class='loginForm'>
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>
                Admin Login
            </div>
        </div>";

        if (!empty($_GET['error'])) {

            $error = $_GET['error'];

            echo "<div class='sectionContainer'>";
    
            require "../messages/errorMessage.php";
    
            buttonlessErrorMessage($error);          
            
            echo "</div>";
        }
        
        echo "
        <p class='loginFormDescription'>Please enter your administrator credentials to login.</p>
        <div class='inputContainer'>
            <div class='input'>
                <input class='inputBox' placeholder='Username' type='text' name='adminUser'>
            </div>
            <div class='input'>
                <input class='inputBox' placeholder='Password' type='password' name='adminPass'>
            </div>
            <div class='input'>
                <button type='submit' class='button blue loginButton'>Login</button>
            </div>
        </div>
    </form>
</div>";


require '../view/footer.php';
    
?>

