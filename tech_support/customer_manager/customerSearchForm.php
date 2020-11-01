<?php

// open form and add title
echo "
<form action='index.php' method='get' class='searchForm'>
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>
            Search by Customer Lastname
        </div>
    </div>
";

// add the search input bar with search and reset buttons
echo "
    <div class='customerSearchBar'>
        LastName: <input type='text' name='lastname'>
        <button type='submit' class='button blue'>Search</button>
        <a href='index.php' class='button grey'>Reset</a>
    </div>
";

// this is used to check if there was a message 
// the message would be either updated succesfully or reports an error
if (!empty($_GET['message'])) {

    $message = $_GET['message'];

    echo "
    <div class='customerSearchTitle'>
        <p class='message'>$message</p>
    </div>
    ";
                    
}

// close form
echo "</form>";