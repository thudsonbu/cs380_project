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
    </div>";


$name = $_GET['name'];
$email = $_GET['email'];
$customerID = $_GET['customerID'];


echo "<div class='sectionContainer'>";

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

// PAGE CONTENT
echo "
    <div class='sectionContainer'>
        <form action='processIncident.php' method='post' class='searchForm'>
            <div class='sectionTitleContainer'>
                <div class='sectionTitle'>
                    Create Incident: Incident Report
                </div>
            </div>
            <div class='sectionTitleContainer'>
                <p>Enter incident details.</p>
            </div>
            <div class='reportFormEntry'>
                <p class='reportFormHeading'>Customer:</p>
                <p class='reportFormContent'>$name</p>
            </div>
            <input class='dontDisplay' name='customerID' value='$customerID'>
            <div class='reportFormEntry'>
                <p class='reportFormHeading'>Product:</p>";
            // DROP DOWN (THIS WILL HANDLE ERRORS).
            require( 'productDropdown.php');
            echo "
            </div>
            <div class='reportFormEntry'>
                <p class='reportFormHeading'>Title:</p>
                <input class='reportFormContent' type='text' name='titleName' required>
            </div>
            <div class='reportFormEntry'>
                <p class='reportFormHeading'>Description:</p>
            </div> 
            <div class='reportFormEntry'>
                <textarea class='reportFormContent' rows='5' cols='50' name='description' required></textarea>
            </div>
            <div class='buttonContainer'>
                <a href='index.php' class='button grey'>Cancel</a>
                <button type='submit' class='button green'>Submit</button>
            </div>
        </form>
    </div>";

// PAGE FOOTER
require '../view/footer.php';