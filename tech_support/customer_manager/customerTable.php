<?php

function createCustomerTable($result) {

    $fields = mysqli_fetch_fields($result);

    echo "<table class='peopleTable'>";

    echo "<tr class='tableHeaderRow'>";

    foreach ($fields as $field) {

        echo "<th class='tableHeader'> $field->name </th>";
    }

    echo "<th class='tableHeader'> Select </th>";

    echo "</tr>";

    while ( $line = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {

        echo "<tr class='tableDataRow'>";

            foreach ($line as $field_value) {

                echo "<td class='tableData'>", "$field_value", "</td>";
            }

            echo "<td class='tableData'><button class='selectButton button blue'>Select</button></td>";

        echo "</tr>";
    }

    echo "</table>";

}

?>