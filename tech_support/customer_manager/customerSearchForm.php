<?php

// open form and add title
echo "
    <div class='searchForm'>
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>
               Add a New Customer
            </div>
        </div>
        <a href='newCustomerPage.php' class='button blue'>Add Customer</a>
    </div>
</div>
";


// add the search input bar with search and reset buttons
echo "
<div class='sectionContainer'>
    <div class='searchForm'/>
        <div class='sectionTitleContainer'>
            <div class='sectionTitle'>
                Search Customers
            </div>
        </div>
        <form action='index.php' method='get'>
            <div class='searchBar'>  
                <div class='searchBarInput'>
                    <input placeholder='Lastname' type='text' name='lastname'>
                </div>
                <button type='submit' class='button blue'>Search</button>
            </div>
        </form>
        </div>
    </div>
</div>
";




