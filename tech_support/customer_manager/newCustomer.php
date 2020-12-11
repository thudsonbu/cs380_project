<?php

//database connection and query
require "../model/customer/getCountries.php";

// query the database for the countries
$countryResponse = getCountries();

if($countryResponse[1]){ // error returned from country query
    
    require "../messages/errorMessage.php";
    
    errorMessage($countryResponse[1]);
    
} else if(empty($countryResponse[0])){ // no error but no countries returned
    
    require "../messages/message.php";
    
    customErrorMessage("Countries Not Found");
    
} else { // if there were not errors and everything returned, make the table
    
    echo "<form action='processCustomer.php' method='post' class='form'>";
    
    // form title
    echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>
            Add Customer Information
        </div>
    </div>
    ";

echo "
    <div class='formEntry'>
        <div class='fieldName'>First Name</div>
        <input class='fieldInput' type='text' name='firstName' required>";

    if(isset($_GET['firstName'])){

        $errorMessage = $_GET['firstName'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
        
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Last Name</div>
        <input class='fieldInput' type='text' name='lastName' required>";

    if(isset($_GET['lastNameError'])){

        $errorMessage = $_GET['lastNameError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Address</div>
        <input class='fieldInput' type='text' name='address' required>";

    if(isset($_GET['addressError'])){

        $errorMessage = $_GET['addressError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>City</div>
        <input class='fieldInput' type='text' name='city' required>";

    if(isset($_GET['cityError'])){

        $errorMessage = $_GET['cityError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>State</div>
        <input class='fieldInput' type='text' name='state' required>";

    if(isset($_GET['stateError'])){

        $errorMessage = $_GET['stateError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Postal Code</div>
        <input class='fieldInput' type='text' name='postalCode' required>";

    if(isset($_GET['postalCodeError'])){

        $errorMessage = $_GET['postalCodeError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Country</div>
        <select class='fieldInput' name='countryCode'>
        ";
    // for each country in the country query
    $countryResult = $countryResponse[0];
            
    while($country = mysqli_fetch_array( $countryResult, MYSQLI_ASSOC )) {

         $countryCode = $country['countryCode'];
         $countryName = $country['countryName'];
         // create an option

         echo "<option value='$countryCode'>$countryName</option>";
         
    }
    // close country select
    echo "
         </select>
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Phone (XXX) XXX-XXXX</div>
        <input class='fieldInput' type='text' name='phone' required>";

    if(isset($_GET['phoneError'])){

        $errorMessage = $_GET['phoneError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Email</div>
        <input class='fieldInput' type='text' name='email' required>";

    if(isset($_GET['emailError'])){

        $errorMessage = $_GET['emailError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

    <div class='formEntry'>
        <div class='fieldName'>Password</div>
        <input class='fieldInput' type='text' name='password' required>";

    if(isset($_GET['passwordError'])){

        $errorMessage = $_GET['passwordError'];

        echo "<div class='fieldError'>$errorMessage</div>";
    }
    
    echo "
    </div>

";
// form submit buttons    
echo "
    <div class='buttonContainer'>
        <a href='index.php' class='button grey'>Cancel</a>
        <button type='submit' class='button green'>Add Customer</button>
    </div>
    ";

// end form
echo "</form>";

}    