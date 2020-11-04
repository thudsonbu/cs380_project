
<?php 

require '../view/header.php';

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
    <div class='searchForm'>
        <!-- FORM FOR SEARCHING CUSTOMERS -->
        <?php

        require "customerSearchForm.php";

        // form includes insert feedback
        ?>
    </div>
</div>


<div class='sectionContainer'>
    <!-- FORM FOR SEARCHING CUSTOMERS -->
    <?php
    // this is used to check if there was a message 
    // the message would be either updated succesfully or reports an error
    if (!empty($_GET['message'])) {

        $message = $_GET['message'];

        require "../errors/successMessage.php";

        successMessage($message);
                        
    }

    if (!empty($_GET['error'])) {

        $error = $_GET['error'];

        require "../errors/errorMessage.php";

        customErrorMessage($error);
                        
    }
    ?>
</div>

<div class='sectionContainer'>
        <?php

        require "../model/testInput.php";

        // CHECK IF THERE WAS A GET REQUEST SENT
        if (empty($_GET['lastname'])) {
            // IF THERE WAS NO GET REQUEST SELECT ALL
            $query = "SELECT customerID, firstname, lastname, email, city FROM customers;";

        } else {
            // IF THERE WAS A GET REQUEST USE THE SUPER GLOBAL LAST NAME IN QUERY
            $Search = $_GET['lastname'];

            // TEST FOR HTML INJECTION
            $isHtmlInjection = testInput($Search);

            if($isHtmlInjection){

                require "../errors/errorMessage.php";

                customErrorMessage("HTML INJECTION DETECTED");

                exit();

            }

            $query = "SELECT customerID, firstname, lastname, email, city FROM customers WHERE lastname='$Search'";

        }

        
        require "customerTable.php";

        
        ?>
</div>

<?php

require '../view/footer.php';

?>