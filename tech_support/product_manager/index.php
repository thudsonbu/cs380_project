<!-- This is Part A of Assignment 3: Manage Products (Wei) -->

<?php
    require '../session/sessionConfig.php';
    require '../view/header.php';
    makeHeader('Product Index');
?>

<!-- Responsive Nabvar -->

<?php
    require '../view/nav.php';
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Products
    </div>
</div>

    <div class='sectionContainer'>
    
    <?php
    // this is used to check if there was a message 
    // the message would be either updated succesfully or reports an error
    if (!empty($_GET['message'])) {

        $message = $_GET['message'];

        require "../messages/successMessage.php";

        successMessage($message);
                        
    }

    if (!empty($_GET['error'])) {
        
        $error = $_GET['error'];
        
        require "../messages/errorMessage.php";
        
        customErrorMessage($error);
        
    }
    ?>
    
</div>  
 
    <div class='sectionContainer'>
        <div class='tableContainer'>
            <?php    
            // Test SQL query relevant to the products table
            $query = "SELECT * FROM products;";
            require "productTable.php";        
            ?>
        </div>
    </div>    

<?php

require '../view/footer.php';

?>

