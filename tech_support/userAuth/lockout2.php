<?php

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
        <div class='tableContainer'>
            
<?php
echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>Invalid Login</div>
    </div>";
require "../messages/message.php";

message("Sorry, your email is invalid. Enter a valid email.");
    
?>    
        
  </div>
  <?php

require '../view/footer.php';

?>