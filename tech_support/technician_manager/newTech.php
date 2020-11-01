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

<h1>Register a New Technician</h1>

<form action="techForm.php" method="post">

<table align="center">

<tr><td>First Name:</td><td> <input type="text" name="first"></td></tr><br>
<tr><td>Last Name:</td><td> <input type="text" name="last"></td></tr><br>
<tr><td>Email:</td><td> <input type="text" name="email"></td></tr><br>
<tr><td>Phone:</td><td> <input type="text" name="phone"></td></tr><br>
<tr><td>Password:</td><td> <input type="password" name="pass"></td></tr><br>

<tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
</table>
</form>
    
</body>
</html>
