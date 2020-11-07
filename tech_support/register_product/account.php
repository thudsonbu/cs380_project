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
    <div class='searchForm'>
            
    <?php
        $result = $out[0];
        
        echo "
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>Register Product</div>
        </div>
        <div class='sectionTitleContainer'>
        ";
        
        // Create a form for each record in result set.
        // Print field values for each record
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $firstName = $line['firstName'];
            $lastName = $line['lastName'];

            echo "<p> Welcome $firstName $lastName. </p>";

            echo "</div>";
        }

        echo "<div class='sectionTitleContainer'>";
        
        require 'button.php';

        echo "</div>";
        
    ?>    
    </div>
</div>

<?php

require '../view/footer.php';

?>