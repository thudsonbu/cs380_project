<?php 

require '../session/sessionConfig.php';

if(isset($_SESSION['email'])) {
    header("Location:account.php");
} else {

    require '../view/header.php';
    
    makeHeader('Register Index');
    
    
    
    //RESPONSIVE NAVBAR
    
        require '../view/nav.php';
    
    //PAGE TITLE
    echo "
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            Register
        </div>
    </div>";
    
    //PAGE CONTENT
    echo "
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
            <div class='inputContainer'>
                <div class='input'>
                    <input class='inputBox' placeholder='Email' type='text' name='login'>
                </div>
                <div class='input'> 
                    <button type='submit' class='button blue'>Login</button>
                </div>
            </div>
        </form>
    </div>";
   
    
    require '../view/footer.php';
    
}
?>

