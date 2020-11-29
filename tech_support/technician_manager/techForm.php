<?php
require "../model/technician/postTech.php";
require "../model/testInput.php";


if (empty($_POST['first']) or empty($_POST['last']) or empty($_POST['email']) or empty($_POST['phone']) or empty($_POST['pass'])) 
    throw new Exception("form fields not filled in");


$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];

// test name for HTML characters to avoid HTML Injection
foreach($_POST as $key => $value) {
    
    if(testHTMLInj($value)){
        
        $htmlInjection = true;
    }
}

if(!$htmlInjection) {
    
    // // remove the , from the query with substr (this causes sytax error)
    // $query = substr($query, 0, -2) . "WHERE customerID='$customerID'";
    
    $out = postTech(
        $first,
        $last,
        $email,
        $phone,
        $pass
        );
    
    if(!empty($out[1])){ // IF ERROR ( queryHandler returns array with result and boolean error )
        
        $error = $out[1]->getMessage();
        
        header("Location: index.php?error=$error");
        
    } else if(!$out[0]) { // No messages but no records effected
        
        $rowCount = $out[0];
        
        header("Location: index.php?error='$rowCount Technicians Added'");
        
    } else {
        
        $rowCount = $out[0];
        
        header("Location: index.php?message='$rowCount Technician Added'");
    }
} else {
    
    header("Location: customerFormPage.php?error='HTML INJECTION DETECTED");
}



// CLOSE CONNECTION
mysqli_close($con);

// if failure return to customer form and say failure reason