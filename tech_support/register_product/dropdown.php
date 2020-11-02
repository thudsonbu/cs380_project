<?php

require '../model/database.php';

$query = "SELECT name FROM products;";

$result = mysqli_query($con, $query);

echo "<select name='name'>";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<option value='" . $line['name'] . "'>" . $line['name'] . "</option>";
}
echo "</select>";
?>