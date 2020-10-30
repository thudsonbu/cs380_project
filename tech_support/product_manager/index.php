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

    <!-- Nav Styles -->
    <link rel="stylesheet" href="../css/theme.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/table.css">

    <!-- EMBEDED STYLES ARE PLACED IN PARTIALS/CREATENAMETABLE -->
    
    <!-- My Icon -->
    <link rel="icon" href="./images/avatar.png">

    <title>CS380 A3 - Customer</title>
</head>

<body>
    <!-- Responsive Nabvar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.html">
            <img src="./images/avatar.png" class="myLogo" alt="myLogo">
        </a>
        <!-- Toggle Open Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-haspopup="true" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-nav navItem">
                    <a class="nav-link link" href="./index.html"><span class="">Home</span></a>
                </li>
                <li class="navbar-nav navItem">
                    <a class="nav-link link" href="./Assign1/index.html"><span class="">Assignment 1</span></a>
                </li>
                <li class="navbar-nav navItem">
                    <a class="nav-link link" href="./person.php"><span class="">Person</span></a>
                </li>
                <li class="navbar-nav navItem">
                    <a class="nav-link link" href="./census.php"><span class="">Census</span></a>
                </li>
            </ul>
        </div>
    </nav>

<!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            Product List
        </div>
        <div class='pageSubtitle'>
            Software that manages the products available
        </div>
    </div>

<h1 >Product List</h1>

    <!-- PAGE CONTENT -->
    <div class='sectionContainer'>
        <div class='tableContainer'>
            <?php

            require "productTable.php";

            ?>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>


