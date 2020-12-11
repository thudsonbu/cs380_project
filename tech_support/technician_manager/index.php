
<?php

    require '../session/sessionConfig.php';
    require '../session/expiredSession.php';

    require '../view/header.php';

    makeHeader('Technician Index');

    if($_SESSION['permission'] != 'admin'){ // if they are not an admin they cannot access

        header('Location:../userAuth/adminLoginPage.php?error=Access Denied');
    }

?>

<!-- RESPONSIVE NAVBAR -->
<?php
    require '../view/nav.php'
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Technicians
    </div>
</div>

<!-- PAGE CONTENT -->
<?php
    // this is used to check if there was a message
    // the message would be either updated successfully or reports an error
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
 
<div class='sectionContainer'>
    <div class='tableContainer'>
        <?php
        $query = "SELECT * FROM technicians;";
        require "technicianTable.php";
        ?>
    </div>
</div>
   
<?php

require '../view/footer.php';

?>