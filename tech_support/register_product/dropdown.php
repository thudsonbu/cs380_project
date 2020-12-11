<?php

require_once '../model/getHandler.php';

$dropDown = "SELECT productCode, name FROM products;";

$out = get($dropDown);


if($out[1]){ // IF ERROR ( query returns array with result and boolean error )

    require "../messages/errorMessage.php";
    
    errorMessage($out[1]);
    
} else if(empty($out[0])){ // IF NO ERROR BUT NO RESULTS
    
    $e = 'No Products to Register For';
    
    require '../messages/registerError.php';
    
    registerErrorMessage($e);
    
} else { // IF NO ERROR AND RESULTS CREATE TABLE

    $final = $out[0];
    
    echo "<form method='POST' action='register.php'>";
    
    echo "<div class='searchBar'>
            <div class='searchBarInput'>
                <select name='productCode'>";
        while ($row = mysqli_fetch_array($final, MYSQLI_ASSOC)) {
            echo " <option value='" . $row['productCode'] . "'>" . $row['name'] . "</option>";
        }
    echo "    </select>
            </div>";


    echo"    <button class='button green' type='submit' value='Register' name='register'>Register</button>
            </div>
        </form>";
    
  
}


?>