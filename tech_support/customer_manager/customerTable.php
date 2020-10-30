<?php

require "../model/database.php";

$query = "SELECT * FROM customers;";

$result = mysqli_query($con, $query);

$fields = mysqli_fetch_fields($result);

echo "<table class='peopleTable'>";

echo "<tr class='tableHeaderRow'>";

foreach ($fields as $field) {

    echo "<th class='tableHeader'> $field->name </th>";
}

echo "</tr>";

while ( $line = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {

    echo "<tr class='tableDataRow'>";

        foreach ($line as $field_value) {

            echo "<td class='tableData'>", "$field_value", "</td>";
        }

    echo "</tr>";
}

echo "</table>";

mysqli_close($con);

?>