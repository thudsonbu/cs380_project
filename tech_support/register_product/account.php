<?php

require '../session/sessionConfig.php'; // required for session to be accessed (set variables)

if($_SESSION['permission'] != 'customer'){ // if they are not an admin they cannot access

    header('Location:../userAuth/adminLoginPage.php?error=Access Denied');
}

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

            $firstName = $_SESSION["firstName"];
            $lastName = $_SESSION["lastName"];
            $email = $_SESSION['user'];

            echo "</div>";
                
        require 'dropdown.php';

        echo "  
        <div class='sectionContainer'>
            <p>You are logged in as $email</p>
            <a class='button red' style='color: #ffffff; font-size: .8rem;' onclick='confirmLogout()' title='Logout'>Logout</a>
        </div>      
        ";
        
    ?>    
    </div>
</div>

<?php

require '../view/footer.php';

?>