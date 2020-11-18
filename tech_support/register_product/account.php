<?php

require '../session/sessionConfig.php';

require '../view/header.php';

makeHeader('Login');

?>

<!-- RESPONSIVE NAVBAR -->
<?php
    require '../view/nav.php'
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Register
    </div>
</div>

<!-- PAGE CONTENT -->
<div class='sectionContainer'>
    <div class='searchForm'>
            
    <?php        
        echo "
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>Register Product</div>
        </div>
        <div class='sectionTitleContainer'>
        ";
        
        
        // Create a form for each record in result set.
        // Print field values for each record

            $firstName = $_SESSION["first"];
            $lastName = $_SESSION["last"];
            $email = $_SESSION['email'];

            echo "<p> Welcome $firstName $lastName. </p>";

            echo "</div>";
                
        require 'dropdown.php';

     
        
        echo "You are logged in as $email <br><br>";
        
        echo "<a class='button red' href='logout.php' tite ='Logout'>Logout</a>";
        
    ?>    
    </div>
</div>

<?php

require '../view/footer.php';

?>