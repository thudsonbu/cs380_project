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
    $result = $out[0];
    
    echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>Error</div>
    </div>";
    
    require "../messages/errorMessage.php";
    
    errorMessage($out[1]); // show an error message box
?>    
        
  </div>

<?php

require '../view/footer.php';

?>