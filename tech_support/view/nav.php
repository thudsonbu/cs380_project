<?php

if(isset($_SESSION['permission'])){
    $permission = $_SESSION['permission'];
} else {
    $permission = '';
}

if(isset($_SESSION['logged_in'])){
    $loggedIn = true;
} else {
    $loggedIn = false;
}

echo "

<nav class='navbar fixed-top navbar-expand-md navbar-light bg-light'>
    <a class='navbar-brand' href='../index.php'>
        <img src='../images/avatar.png' class='myLogo' alt='myLogo'>
    </a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-haspopup='true' aria-expanded='false'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav'>";

            if($loggedIn){
                echo "
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='../menuPage.php'>Menu</a>
                </li>
                ";
            }

            // LINKS TO PRODUCT, CUSTOMER, AND TECHNICIAN MANAGEMENT PAGES
            if($permission === 'admin'){
                // PRODUCT MANAGEMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Products
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='../product_manager/index.php'>Manage Products</a>
                        <a class='dropdown-item' href='../product_manager/addProduct.php'>New Products</a>
                    </div>
                </li> ";
                // TECH MANAGMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Technicians
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='../technician_manager/index.php'>Manage Technicians</a>
                        <a class='dropdown-item' href='../technician_manager/newTech.php'>New Technician</a>
                    </div>
                </li>";
                // CUSTOMER MANAGEMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Customers
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='../customer_manager/index.php'>Manage Customer</a>
                        <a class='dropdown-item' href='../customer_manager/index.php'>New Customer</a>
                    </div>
                </li> ";
                // INCIDENT MANAGEMENT
                echo "
                <li class='nav-item dropdown navItem'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Incidents
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        <a class='dropdown-item' href='../create_incident/index.php'>Create Incident</a>
                        <a class='dropdown-item' href='../update_incident/index.php'>Assign Incident</a>
                    </div>
                </li>";
            }
            
            // REGISTER PRODUCT PAGE LINK FOR CUSTOMERS
            if($permission === 'customer'){
                echo "
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='../register_product/index.php'>Register Product</a>
                </li>
                ";
            }

            // LINKS TO CREATE INCIDENTS AND VIEW INCIDENTS FOR TECHS
            if($permission === 'tech') {
                echo "
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='../tech_incident/index.php'>My Incidents</a>
                </li>
                ";
            } 
            
        echo "
        </ul>
        "; 

if (isset($_SESSION['logged_in'])){

    $user = $_SESSION['user'];

    echo "
        <div class='nav-item dropdown ml-auto'>
            <a class='nav-link dropdown-toggle greenText' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top greenText'></i>$user
            </a>
            <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item redText' href='../userAuth/logout.php'>Logout</a>
            </div>
        </div>
    ";
} else {

    echo "
        <div class='nav-item dropdown ml-auto'>
            <a class='nav-link dropdown-toggle greyText' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top greyText'></i>
            </a>
            <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item greenText' href='../userAuth/adminLoginPage.php'>Admin Login</a>
                <a class='dropdown-item greenText' href='../userAuth/techLoginPage.php'>Tech Login</a>
                <a class='dropdown-item greenText' href='../userAuth/customerLoginPage.php'>Customer Login</a>
            </div>
        </div>
    ";
}

echo "
    </div>
</nav>

";