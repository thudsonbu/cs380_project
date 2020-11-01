<?php

if (empty($_POST['first']) or empty($_POST['last']) or empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['pass'])) throw new Exception("form fields not filled in");


$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];


// Connect to MySQL, select database
require ("../model/database.php");

// test name for HTML characters to avoid HTML Injection
require ("TestInput.php");
$first = test_input($first);
$last = test_input($last);
$email = test_input($email);
$phone = test_input($phone);
$pass = test_input($pass);

// Perform SQL query
$query = "INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES('$first', '$last', '$email', '$phone', '$pass')";

mysqli_query($con, $query);

?>

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

    <title>CS380 A3 - Technician</title>
</head>


<body>
    <!-- Responsive Nabvar -->
    <?php
        require '../view/nav.php';
    ?>

    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            SportPro Technical Support
        </div>
        <div class='technicianList'>
            Sports manaagement software for sports enthusiasts.
        </div>
    </div>

    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            SportsPro
        </div>
    </div>
	<h2 style="text-align: center;">Added <?php echo $first ?> as Technician</h2>
	<br>
	<br>
	<a href="index.php">Return</a>
</body>
</html>