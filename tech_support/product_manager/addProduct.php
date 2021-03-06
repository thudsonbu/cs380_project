    <!-- Utilizing the header.php to format the header of the website -->

<?php

    require '../session/sessionConfig.php';
    require '../view/header.php';
    makeHeader('Products Index');

    if($_SESSION['permission'] != 'admin'){ // if they are not an admin they cannot access

        header('Location:../userAuth/adminLoginPage.php?error=Access Denied');
    }
?>

    <!-- Responsive Nabvar -->

<?php
    require '../view/nav.php';
?>

    <!-- PAGE TITLE -->
    
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Products
    </div>
</div>

	<!-- Beginning of form contents -->
    <div class='sectionContainer'>
        <form action="processAddProductForm.php" class='form' method="post">
            <div class='sectionTitleContainer'>
                <div class='sectionTitle'>
                    Add Products
                </div>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Product Code</div>
                <input class='fieldInput' type='text' name='code' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Product Name</div>
                <input class='fieldInput' type='text' name='name' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Version</div>
                <input class='fieldInput' type='text' name='version' required>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Release Date (YYYY-MM-DD)</div>
                <input class='fieldInput' type='date' name='releaseDate' required>
            </div>
            <div class='buttonContainer'>
                <a href='index.php' class='button grey'>Cancel</a>
                <button type='submit' class='button green'>Save New Product</button>
            </div>
        </form>
    </div>
    
    <!-- Utilizing the footer.php to format the footer portion of the website -->

<?php
    require '../view/footer.php';
?>


