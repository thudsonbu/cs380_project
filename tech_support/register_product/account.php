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
        <div class='sectionTitle'>Register Product</div>
    </div>";
    
    // Create a form for each record in result set.
    // Print field values for each record
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo 'Welcome, ';
        echo $line['firstName'];
        echo ' ';
        echo $line['lastName'];
   }
    
    require 'button.php';

        
    
?>    
        
  </div>
  <?php

require '../view/footer.php';

?>