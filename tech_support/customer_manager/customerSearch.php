<?php

echo "
<form action='index.php' method='get' class='searchForm'>
    <div class='customerSearchTitle'>
        Search by Customer Lastname
    </div>
    <div class='customerSearchBar'>
        LastName: <input type='text' name='lastname'>
        <button type='submit' class='button blue'>Search</button>
        <a href='index.php' class='button grey'>Reset</a>
    </div>
    
";

if (!empty($_GET['message'])) {

    $message = $_GET['message'];

    echo "
    <div class='customerSearchTitle'>
        $message
    </div>
    ";
                    
}

echo "</form>";