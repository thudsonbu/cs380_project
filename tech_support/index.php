<!DOCTYPE html>
<html>
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

    <title>CS380 A3 - Customer</title>
</head>


<body>   

    <nav class='navbar navbar-fixed-top navbar-expand-md navbar-light bg-light'>
        <!-- Brand -->
        <a class='navbar-brand' href='index.php'>
            <img src='./images/avatar.png' class='myLogo' alt='myLogo'>
        </a>
        <!-- Toggle Open Button -->
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-haspopup='true' aria-expanded='false'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <!-- Navbar Content -->
        <div class='collapse navbar-collapse' id='navbarCollapse'>
            <ul class='navbar-nav ml-auto'>
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./index.php'><span class=''>Home</span></a>
                </li>
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./product_manager/index.php'><span class=''>Product</span></a>
                </li>
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./technician_manager/index.php'><span class=''>Technician</span></a>
                </li>
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./customer_manager/index.php'><span class=''>Customer</span></a>
                </li>
                <li class='navbar-nav navItem'>
                    <a class='nav-link link' href='./register/index.php'><span class=''>Register Product</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            SportsPro
        </div>
        <div class='pageSubtitle'>
            Smart sports management software.
        </div>
    </div>

    
    <div class='homeButtonContainer'>
        <a href='./customer_manager/index.php' class='squishyButton'><i class="fas fa-users"></i>Customers</a>
        <a href='./product_manager/index.php' class='squishyButton'><i class="fas fa-shopping-cart"></i>Products</a>
        <a href='./technician_manager/index.php' class='squishyButton'><i class="fas fa-wrench"></i>Technicians</a>
        <a href='./register_product/index.php' class='squishyButton'><i class="fas fa-wrench"></i>Register Product</a>
    </div>

</div>
