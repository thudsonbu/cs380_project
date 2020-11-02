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
    </div>
";

// close form
echo "</form>";