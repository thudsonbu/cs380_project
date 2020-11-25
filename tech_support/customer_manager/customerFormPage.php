
<?php 

require '../session/sessionConfig.php';
require '../session/expiredSession.php';

require '../view/header.php';

makeHeader('Update Customer');

require '../view/nav.php'
    
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Update Customer
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

            require "customerEditForm.php";
        }
    ?>
</div>

<?php 

require '../view/footer.php';

?>