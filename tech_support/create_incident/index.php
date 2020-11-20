<?php

require '../session/sessionConfig.php';

require '../view/header.php';

makeHeader('Incident Index');

//RESPONSIVE NAVBAR
require '../view/nav.php';

//PAGE TITLE
echo "
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            Create Incident
        </div>
    </div>";

//PAGE CONTENT
echo "
    <div class='sectionContainer'>
        <form action='processEmail.php' method='post' class='searchForm'>
            <div class='sectionTitleContainer'>
                <div class='sectionTitle'>
                    Get Customer
                </div>
            </div>
            <div class='sectionTitleContainer'>
                <p>You must enter the customer's email address to select the customer </p>
            </div>
            <div class='inputBar'>
                <div class='input'>
                    Email: <input type='text' name='email'>
                </div>
                <button type='submit' class='button blue'>Get Customer</button>
            </div>
        </form>
    </div>";

require '../view/footer.php';
  
?>