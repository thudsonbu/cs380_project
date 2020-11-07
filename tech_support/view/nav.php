<?php

echo "

<nav class='navbar navbar-fixed-top navbar-expand-md navbar-light bg-light'>
    <!-- Brand -->
    <a class='navbar-brand' href='../index.php'>
        <img src='../images/avatar.png' class='myLogo' alt='myLogo'>
    </a>
    <!-- Toggle Open Button -->
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-haspopup='true' aria-expanded='false'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <!-- Navbar Content -->
    <div class='collapse navbar-collapse' id='navbarCollapse'>
        <ul class='navbar-nav ml-auto'>
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../index.php'><span class=''>Home</span></a>
            </li>
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../product_manager/index.php'><span class=''>Product</span></a>
            </li>
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../technician_manager/index.php'><span class=''>Technician</span></a>
            </li>
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../customer_manager/index.php'><span class=''>Customer</span></a>
            </li>
            <li class='navbar-nav navItem'>
                <a class='nav-link link' href='../register_product/index.php'><span class=''>Register Product</span></a>
            </li>
        </ul>
    </div>
</nav>

";