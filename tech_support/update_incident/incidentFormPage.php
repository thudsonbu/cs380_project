
<?php 

require '../session/sessionConfig.php';
require '../session/expiredSession.php';

if($_SESSION['permission'] != 'admin'){ // if they are not an admin they cannot access
    
    header('Location:../userAuth/adminLogin.php?error=Access Denied');
}

require '../view/header.php';

makeHeader('Update Incident');

require '../view/nav.php'
    
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Update Incidents
    </div>
</div>

<!-- PAGE CONTENT -->
<div class='sectionContainer'>
    <?php

        if(isset($_GET['error'])){

            $error = $_GET['error'];

            require "../messages/errorMessage.php";

            customErrorMessage($error);

        } else {

            require "incidentEditForm.php";
        }
    ?>
</div>

<?php 

require '../view/footer.php';

?>