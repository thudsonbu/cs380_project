<?php

require_once '../model/getHandler.php';

$dropDown = "SELECT productCode, name FROM products;";

$out = get($dropDown);

$result = $out[0];
$error = $out[1];

// HANDLE QUERY RESULT
if($error){

    $errorMessage = $error->getMessage();
    header( "Location: index.php?error=$errorMessage");
    exit();

} elseif (!$result){

    $noResult = 'No products available.';
    header( "Location: index.php?message=$noResult");
    exit();

} else {

    echo "<select name='productCode' class='reportFormDropdown'>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='" . $row['productCode'] . "'>" . $row['name'] . "</option>";
    }
    echo "</select>";

}