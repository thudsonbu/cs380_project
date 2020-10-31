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

        $selectLink = "customerFormPage.php?email=";
        $loc = 0;

        echo "<tr class='tableDataRow'>";

            foreach ($line as $field_value) {

                if ($loc == 2) {

                    $selectLink = $selectLink . $field_value;
                    
                }

                echo "<td class='tableData'>", "$field_value", "</td>";
                

                $loc += 1;
            }

            echo "<td class='tableData'><a href='$selectLink'><button class='button blue'>Select</button></a></td>";

        echo "</tr>";
    }

    echo "</table>";

}

?>