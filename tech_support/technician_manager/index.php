
<?php

require '../session/sessionConfig.php';
require '../session/expiredSession.php';

require '../view/header.php';

makeHeader('Technician Index');

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
            $query = "SELECT * FROM technicians;";
            
            require "technicianTable.php";
           
            ?>
        </div>
    </div>
   
<?php

require '../view/footer.php';

?>