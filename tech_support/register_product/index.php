<?php 

require '../view/header.php';

makeHeader('Register Index');

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
    <form action='processLogin.php' method='post' class='searchForm'>
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>
                Customer Login
            </div>
        </div>
        <div class='sectionTitleContainer'>
            <p>You must login before you can register a product </p>
        </div>
        <div class='inputBar'>
            <div class='input'>
                Email: <input type='text' name='login'>
            </div>
            <button type='submit' class='button blue'>Login</button>
        </div>
    </form>
</div>

<?php

require '../view/footer.php';

?>

