<?php

echo "

<nav class='navbar fixed-top navbar-expand-md navbar-light bg-light'>
    <a class='navbar-brand' href='../index.php'>
        <img src='../images/avatar.png' class='myLogo' alt='myLogo'>
    </a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-haspopup='true' aria-expanded='false'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav'>
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../index.php'><span class=''>Home</span></a>
            </li>
            <li class='nav-item dropdown navItem'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Products
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                    <a class='dropdown-item' href='../product_manager/index.php'>View Products</a>
                    <a class='dropdown-item' href='../product_manager/addProduct.php'>New Products</a>
                    <a class='dropdown-item' href='../register_product/index.php'>Register Product</a>
                </div>
            </li>
            <li class='nav-item dropdown navItem'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Technicians
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                    <a class='dropdown-item' href='../technician_manager/index.php'>View Technicians</a>
                    <a class='dropdown-item' href='../technician_manager/newTech.php'>New Technician</a>
                </div>
            </li>
            <li class='nav-item dropdown navItem'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Customer
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                    <a class='dropdown-item' href='../customer_manager/index.php'>View Customer</a>
                    <a class='dropdown-item' href='../create_incident/index.php'>Create Incident</a>
                </div>
            </li>
        </ul>

";

if (isset($_SESSION['logged_in'])){

    $user = $_SESSION['user'];

    echo "
        <div class='nav-item dropdown ml-auto'>
            <a class='nav-link dropdown-toggle greenText' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fas fa-user top greenText'></i>$user
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                <a class='dropdown-item redText' href='../register_product/logout.php'>Loggout</a>
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
                <a class='dropdown-item greenText' href='../register_product/index.php'>Login</a>
            </div>
        </div>
    ";
}

echo "
    </div>
</nav>

";