<!-- SESSION DETECTION AND PAGE HEADER -->
<?php 
// SESSION DETECTION
require '../session/sessionConfig.php';

if($_SESSION['permission'] != 'admin'){ // if they are not an admin they cannot access

    header('Location:../userAuth/adminLogin.php?error=Access Denied');
}
// MAKE HEADER METHOD
require '../view/header.php';
// CREATE HEADER WITH PAGE TITLE
makeHeader('Customer Index');
?>

<!-- RESPONSIVE NAVBAR -->
<?php
    require '../view/nav.php'
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Customers
    </div>
</div>

<!-- PAGE CONTENT -->
<div class='sectionContainer'>
    <!-- FORM FOR SEARCHING CUSTOMERS -->
    <?php

    require "customerSearchForm.php";

    // form includes insert feedback
    ?>
</div>

<!-- MESSAGE BOXES -->
<div class='sectionContainer'>
    <!-- FORM FOR SEARCHING CUSTOMERS -->
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

<!-- CUSTOMER TABLE -->
<div class='sectionContainer'>
        <?php

        require "../model/testInput.php";

        // CHECK IF THERE WAS A GET REQUEST SENT
        if (empty($_GET['lastname'])) {
            // IF THERE WAS NO GET REQUEST SELECT ALL
            $query = "SELECT customerID, CONCAT(firstname, ' ', lastname) AS 'Name', email, city FROM customers;";

            // DATABASE, QUERY AND CUSTOMER TABLE CREATOR
            require "../model/getHandler.php";

            $out = get($query);

        } else {
            // IF THERE WAS A GET REQUEST USE THE SUPER GLOBAL LAST NAME IN QUERY
            $lastName = $_GET['lastname'];

            // TEST FOR HTML INJECTION
            $isHtmlInjection = testHTMLInj($lastName);

            if($isHtmlInjection){

                require "../messages/errorMessage.php";

                customErrorMessage("HTML INJECTION DETECTED");

                exit();

            }

            require "../model/customer/searchCustomer.php";

            $out = searchCustomer($lastName);

        }
        
        require "customerTable.php";

        ?>
</div>

<!-- PAGE FOOTER -->
<?php

require '../view/footer.php';

?>