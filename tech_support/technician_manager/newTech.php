
<?php 

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

    <div class='sectionContainer'>
        <form action="techForm.php" class='form' method="post">
            <div class='sectionTitleContainer'>
                <div class='sectionTitle'>
                    Update Technician Information
                </div>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>First Name:</div>
                <input class='fieldInput' type='text' name='first' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Last Name:</div>
                <input class='fieldInput' type='text' name='last' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Email:</div>
                <input class='fieldInput' type='text' name='email' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Phone Number:</div>
                <input class='fieldInput' type='text' name='phone' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Password:</div>
                <input class='fieldInput' type='password' name='pass' required>
            </div>
            <div class='buttonContainer'>
                <a href='index.php' class='button grey'>Cancel</a>
                <button type='submit' class='button green'>Save Technician</button>
            </div>
        </form>
    </div>

<?php

require '../view/footer.php';

?>
