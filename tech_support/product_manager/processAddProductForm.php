<?php

// get values sent from browser and test that both are filled in.
if (! empty($_POST['code']) or 
    ! empty($_POST['name']) or 
    ! empty($_POST['version']) or 
    ! empty($_POST['releaseDate']))

    $code = $_POST['code'];        
    $name = $_POST['name'];
    $version = $_POST['version'];
    $releaseDate = $_POST['releaseDate'];
 
    // Connect to MySQL, select database
    require ("../model/postHandler.php");
    
    // test name for HTML characters to avoid HTML Injection
    require ("testInput.php");
    $code = test_input($code);
    $name = test_input($name);
    $version = test_input($version);
    $releaseDate = test_input($releaseDate);

    // Perform SQL query
    $query = "INSERT INTO products (productCode, name, version, releaseDate) VALUES('$code', '$name', '$version', '$releaseDate')";
    $outarray = post($query);
    
    // IF ERROR ( queryHandler returns array with result and boolean error )
    if(!empty($outarray[1])) {
        $error = $outarray[1]->getMessage();
        header("Location: index.php?error=$error");
    }
    // No messages but no records affected
    else if(!$outarray[0]) {
        $rowTotal = $outarray[0];
        header("Location: index.php?error='$rowTotal Rows updated' ");
    }
    else {
        $rowTotal = $outarray[0];
        header("Location: index.php?message='$rowTotal Rows updated' ");
    }
        
    $result = mysqli_query($con, $query);

?>