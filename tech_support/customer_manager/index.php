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
    <!-- RESPONSIVE NAVBAR -->
    <?php
        require '../view/nav.php'
    ?>

    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            Search Customer
        </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class='sectionContainer'>
        <div class='tableContainer'>
            <div class='searchForm'>
                <!-- FORM FOR SEARCHING CUSTOMERS -->
                <?php

                require "customerSearch.php";

                ?>
            </div>
            <?php

            require "../model/testInput.php";

            // CHECK IF THERE WAS A GET REQUEST SENT
            if (empty($_GET['lastname'])) {
                // IF THERE WAS NO GET REQUEST SELECT ALL
                $query = "SELECT firstname, lastname, email, city FROM customers;";

            } else {
                // IF THERE WAS A GET REQUEST USE THE SUPER GLOBAL LAST NAME IN QUERY
                $Search = $_GET['lastname'];

                // TEST FOR HTML INJECTION
                $isHtmlInjection = testInput($Search);

                if($isHtmlInjection){

                    echo "HTML Injection Detected";

                    $query = "SELECT firstname, lastname, email, city FROM customers;";
                } else {

                    $query = "SELECT firstname, lastname, email, city FROM customers WHERE lastname='$Search';";
                }

            }

            // DATABASE, QUERY AND CUSTOMER TABLE CREATOR
            require "../model/database.php";
            require "../model/selectQuery.php";
            require "customerTable.php";

            $out = selectQuery($con, $query);

            if($out[1]){ // IF ERROR ( selectQuery returns array with result and boolean error )

                echo "Query Error";

            } else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS

                echo "No Results Found";


            } else { // IF NO ERROR AND RESULTS CREATE TABLE

                createCustomerTable($out[0]);
            }

            // CLOSE CONNECTION
            mysqli_close($con);

            ?>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>


