<?php
require 'session/sessionConfig.php';
require 'view/header.php';
require 'view/nav.php';

?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Style Sheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- Nav Styles -->
    <link rel="stylesheet" href="./css/theme.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="./css/table.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="./css/customer.css">

    <!-- EMBEDED STYLES ARE PLACED IN PARTIALS/CREATENAMETABLE -->
    
    <!-- My Icon -->
    <link rel="icon" href="./images/avatar.png">

    <title>Sports Pro: Home</title>
</head>




<body>   



    <nav class='navbar fixed-top navbar-expand-md navbar-light bg-light'>
        <!-- Brand -->
        <a class='navbar-brand' href='index.php'>
            <img src='images/avatar.png' class='myLogo' alt='myLogo'>
        </a>
        <!-- Toggle Open Button -->
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-haspopup='true' aria-expanded='false'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <!-- Navbar Content -->
        <div class='collapse navbar-collapse' id='navbarCollapse'>
            <ul class='navbar-nav'>
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='index.php'><span class=''>Home</span></a>
                </li>
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Products
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./product_manager/index.php'>View Products</a>
                        <a class='dropdown-item' href='./product_manager/addProduct.php'>New Products</a>
                        <a class='dropdown-item' href='./register_product/index.php'>Register Product</a>
                    </div>
                </li>
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Technicians
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./technician_manager/index.php'>View Technicians</a>
                        <a class='dropdown-item' href='./technician_manager/newTech.php'>New Technician</a>
                    </div>
                </li>
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Customer
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='./customer_manager/index.php'>View Customer</a>
                        <a class='dropdown-item' href='./create_incident/index.php'>Create Incident</a>
                        <a class='dropdown-item' href='./update_incident/index.php'>Assign Incident</a>
                        
                    </div>
                </li>
            </ul>

<?php
if (isset($_SESSION['logged_in'])){

    $firstname = $_SESSION['user'];

    echo "
        <div class='nav-item dropdown ml-auto'>
            <a class='nav-link dropdown-toggle greenText' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top greenText'></i>$firstname
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item redText' href='register_product/logout.php'>Logout</a>
            </div>
        </div>
    ";
} else {

    echo "
        <div class='nav-item dropdown ml-auto'>
            <a class='nav-link dropdown-toggle greyText' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top greyText'></i>
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item greenText' href='userAuth/adminLogin.php'>Admin Login</a>
                <a class='dropdown-item greenText' href='userAuth/techLoginPage.php'>Tech Login</a>
                <a class='dropdown-item greenText' href='userAuth/customerLoginPage.php'>Customer Login</a>
            </div>
        </div>
    ";
}
?>

        </div>
    </nav>

    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            SportsPro
        </div>
        <div class='pageSubtitle'>
            Smart sports management software.<br>
            Please Select your login type.
        </div>
    </div>

    <div class='homeButtonContainer'>
        <a href='userAuth/adminLoginPage.php' class='squishyButton'><i class="fas fa-book"></i>Admin</a>
        <a href='userAuth/techLoginPage.php' class='squishyButton' ><i class="fas fa-wrench"></i>Technician</a>
        <a href='userAuth/customerLoginPage.php' class='squishyButton'><i class="fas fa-user"></i>Customer</a>
    </div>


<footer class='footer'>
    <div class='footerCopyright'>
        &#169; SportPro Technologies 2020
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
