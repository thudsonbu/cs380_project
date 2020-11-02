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
            SportsPro
        </div>
    </div>

    <div class='sectionContainer'>
        <form action="techForm.php" class='form' method="post">
            <div class='sectionTitleContainer'>
                <div class='sectionTitle'>
                    Update Customer Information
                </div>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>First Name:</div>
                <input class='fieldInput' type='text' name='first'>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Last Name:</div>
                <input class='fieldInput' type='text' name='last'>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Email:</div>
                <input class='fieldInput' type='text' name='email'>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Phone Number:</div>
                <input class='fieldInput' type='text' name='phone'>
            </div>
            <div class='formEntry'>
                <div class='fieldName'>Password:</div>
                <input class='fieldInput' type='password' name='pass'>
            </div>
            <div class='buttonContainer'>
                <a href='index.php' class='button grey'>Cancel</a>
                <button type='submit' class='button green'>Save Technician</button>
            </div>
        </form>
    </div>

</body>
</html>
