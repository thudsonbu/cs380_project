<!-- SESSION DETECTION AND PAGE HEADER -->
<?php 
// SESSION DETECTION
require '../session/sessionConfig.php';

if($_SESSION['permission'] != 'admin'){ // if they are not an admin they cannot access

    header('Location:../userAuth/adminLoginPage.php?error=Access Denied');
}

// MAKE HEADER METHOD
require '../view/header.php';
// CREATE HEADER WITH PAGE TITLE
makeHeader('Update Incident Index');
?>

<!-- RESPONSIVE NAVBAR -->
<?php
    require '../view/nav.php'
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer '>
    <div class='pageTitle'>
        Display Incidents
    </div>
<div>

<div class='sectionContainer'>
    <div class='filterForm'>
        <form action="" method="post">
            <?php 
            
            //if this is the pages first time being rendered, set the filter variable to empty
            if (!isset($_POST['filter'])) {
                $_POST['filter'] = NULL;
            }
            
            //display the desired buttons depending on the user navigation of the filtering options
            if ($_POST['filter'] != 'full' & !empty($_POST['filter'])) {
                echo "<button class='button blue' type='submit' name='filter' value='full'>All</button>";
            }
            if ($_POST['filter'] != 'open' || empty($_POST['filter'])) {
                echo "<button class ='button blue' class = 'peopleTable' type='submit' name='filter' value='open'>Open</button>";
            } 
            if ($_POST['filter'] != 'unassigned' || empty($_POST['filter'])) {
                echo "<button class='button blue' type='submit' name='filter' value='unassigned'>Unassigned</button>";   
            } 
            
            ?>
        </form>
    </div>
</div>


<!-- PAGE CONTENT -->
<!-- MESSAGE BOXES -->
<div class='sectionContainer'>
    <!-- FORM FOR SEARCHING INCIDENTS -->
    <?php
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
    ?>
</div>

<!-- INCIDENT TABLE -->
<div class='sectionContainer'>
        <?php

        require "../model/testInput.php";
        
        // DATABASE, QUERY AND CUSTOMER TABLE CREATOR
        require "../model/getHandler.php";
            
        // CHECK IF THERE WAS A GET REQUEST SENT
        if (empty($_POST['filter']) || $_POST['filter'] == 'full') {
            // IF THERE WAS NO GET REQUEST SELECT ALL
            $query = "SELECT incidentID, techID, title, customerID, productCode, dateOpened, dateClosed FROM incidents;";

            $out = get($query);
            
        } elseif ($_POST['filter'] == 'open') {
            // IF THERE WAS NO GET REQUEST SELECT ALL
            $query = "SELECT incidentID, techID, title, customerID, productCode, dateOpened, dateClosed FROM incidents WHERE dateClosed IS NULL OR dateClosed = '';";
                        
            $out = get($query);
                        
        } elseif ($_POST['filter'] == 'unassigned') {
            // IF THERE WAS NO GET REQUEST SELECT ALL
            $query = "SELECT incidentID, techID, title, customerID, productCode, dateOpened, dateClosed FROM incidents WHERE techID IS NULL OR techID = '';";
            
            $out = get($query);
            
        }
        
        require "incidentTable.php";
        
        ?>
</div>

<!-- PAGE FOOTER -->
<?php

require '../view/footer.php';

?>