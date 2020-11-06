<?php

require_once '../model/getHandler.php';

$dropDown = "SELECT name FROM products;";

$out = get($dropDown);

$final = $out[0];

echo "<select name='productName'>";
while ($row = mysqli_fetch_array($final, MYSQLI_ASSOC)) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}
echo "</select>";
?>