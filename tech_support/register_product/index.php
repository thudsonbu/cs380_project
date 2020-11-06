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
        <div class='tableContainer'>
            
            <h1>Customer Login</h1>
            <p>You must login before you can register a product </p>
            
          
			<form method='post' action='processLogin.php'>            
            <table align="center">
            <tr><td>Email:</td><td> <input type="text" name="login" class="solid"></td></tr><br>
            <tr><td colspan="2"><input type="submit" value="Login"></td></tr>
            </table>
            </form>
            
 
        </div>
    </div>

<?php

require '../view/footer.php';

?>

