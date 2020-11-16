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
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../customer_manager/index.php'><span class=''>Customers</span></a>
            </li>
        </ul>

";

if (isset($_SESSION['email'])){

    $firstname = $_SESSION['first'];

    echo "
        <li class='navbar-nav greenText ml-auto'>
            <i class='fas fa-user top greenText'></i>$firstname
        </li>
    ";
} else {

    echo "
        <li class='navbar-nav ml-auto'>
            <i class='fas fa-user-times top greyText'></i>
        </li>
    ";

}

echo "
    </div>
</nav>

";