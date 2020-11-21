<?php
// SESSION DETECTION
require '../session/sessionConfig.php';
// INCLUDE MAKE HEADER METHOD
require '../view/header.php';
// CREATE THE PAGE TITLE WITH
makeHeader('Create Incident: Search Customer');

// RESPONSIVE NAVBAR
require '../view/nav.php';

// PAGE TITLE
echo "
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            Create Incident
        </div>
    </div>
    
<div class='sectionContainer'>";

    // this is used to check if there was a message
    // the message would be either updated succesfully or reports an error
    if (!empty($_GET['success'])) {

        $success = $_GET['success'];

        require "../messages/successMessage.php";

        successMessage($success);

    }

    if (!empty($_GET['message'])) {

        $message = $_GET['message'];

        require "../messages/message.php";

        message($message);

    }

    if (!empty($_GET['error'])) {

        $error = $_GET['error'];

        require "../messages/errorMessage.php";

        customErrorMessage($error);

    }
echo "
</div>
";

echo "
    <div class='sectionContainer'>
        <form action='processEmail.php' method='post' class='searchForm'>
            <div class='sectionTitleContainer'>
                <div class='sectionTitle'>
                    Create Incident: Search Customer
                </div>
            </div>
            <div class='sectionTitleContainer'>
                <p>Search for customer with email.</p>
            </div>
            <div class='inputBar'>
                <div class='input'>
                    Email: <input type='text' name='email' required>
                </div>
                <button type='submit' class='button blue'>Search Customer</button>
            </div>
        </form>
    </div>";

// PAGE FOOTER
require '../view/footer.php';