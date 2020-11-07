<!DOCTYPE html>
<html>
<head>
	<title> Manage Products Table </title>
	<link href= "table.css" rel = "stylesheet">
</head>
<body>
<h1 >Product List</h1>
<table align = "Left">

<?php
require('../model/database.php');

// Check connection
if (mysqli_connect_errno ( $con )) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error ()."<br>";
    exit("Connect Error");
}
else echo '' . '<br/>';

// creating the delete button to remove records
if (! empty($_POST['productCode'])) {
    $productID = $_POST['productCode'];
    $query = "DELETE FROM products WHERE productCode='$productID';";
    $result = mysqli_query($con, $query);
}

// Perform SQL query
$query = "SELECT * FROM products;";
$result = mysqli_query($con, $query) or  die('Query failed: ' . mysqli_errno($con));

// loop over for headers
$finfo = mysqli_fetch_fields($result);
echo "<tr>";

foreach ($finfo as $val){
    echo "<th> $val->name</th>  ";
}
echo "</tr>";

// table column header done, now loop over result set.
// Create a form for each record in result set.
// Print field values for each record
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    echo "<tr>";
    echo "<form method='POST' action='index.php'>";
    // inner loop. Print each field value for a result set record
    foreach ($line as $key => $value) {
        echo "<td><input type='text' value='" . $value . "' name='" . $key . "'/></td>";
    }
    
    // put delete button on form
    echo "<td><input type='submit' value='delete' name='foo'/></td></tr>";
    echo "</form>";
} // end while

// close connection
mysqli_close ($con);

?>

    </table>
   </body> 
</html>


<!-- Below code belongs to the processAddProductForm.php after the PHP area -->


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
        
<title>CS380 A3 - Products</title>
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
            Sports management software for sports enthusiasts.
        </div>
    </div>

    <!-- PAGE TITLE -->
    <div class='pageTitleContainer'>
        <div class='pageTitle'>
            SportsPro
        </div>
    </div>
	<h2 style="text-align: center;">Added <?php echo $name ?> as a Product</h2>
	<br>
	<br>
	<a href="index.php">Return</a>
</body>
</html>