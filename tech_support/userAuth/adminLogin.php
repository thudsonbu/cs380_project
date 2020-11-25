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
    <form action='processLogin.php' method='post' class='searchForm'>
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>
                Admin Login
            </div>
        </div>
        <div class='sectionTitleContainer'>
            <p>Please enter your administrator credentials to login.</p>
        </div>
        <div class='inputBar'>
            <div class='input'>
                <input placeholder='Username' type='text' name='adminUser'>
                <input placeholder='Password' type='password' name='adminPass'>
            </div>
            <button type='submit' class='button blue'>Login</button>
        </div>
    </form>
</div>";


require '../view/footer.php';
    
?>

