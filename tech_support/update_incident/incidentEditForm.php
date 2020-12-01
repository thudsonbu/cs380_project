<?php

//database connection and query
require "../model/incident/getTechs.php";
require "../model/incident/getincident.php";

// get the email of the incident that was selected
$incidentID = $_GET['incidentID'];

// query the database for the incident
$incidentResponse = getIncident($incidentID);

// query the database for the techs
$techResponse = getTech();

if($incidentResponse[1]){ // error in incident query
    
    require "../messages/errorMessage.php";
    
    errorMessage($incidentResponse[1]);
    
} else if(empty($incidentResponse[0])){ // no error but no results returned from incident query
    
    require "../messages/message.php";
    
    message("Incident Not Found");
    
} else if($techResponse[1]){ // error returned from tech query
    
    require "../messages/errorMessage.php";
    
    errorMessage($techResponse[1]);
    
} else if(empty($techResponse[0])){ // no error but no techs returned
    
    require "../messages/message.php";
    
    customErrorMessage("Technicians Not Found");
    
} else { // if there were not errors and everything returned, make the table
    
    echo "<form action='processIncident.php' method='post' class='form'>";
    
    // form title
    echo "
    <div class='sectionTitleContainer'>
        <div class='sectionTitle'>
            Update Incident Information
        </div>
    </div>
    ";
    
    //  set variables from query
    $incidentResult = $incidentResponse[0];
    $fields = mysqli_fetch_fields($incidentResult);
    $line = mysqli_fetch_array($incidentResult,  MYSQLI_ASSOC);
    
    // print fields as form inputs from incident
    foreach ($fields as $field){
        
        $field_name = $field->name;
        $field_value = $line[$field_name];
        
        // incident id should not be displayed
        if ($field_name == 'incidentID'){
            echo "
                <div class='dontDisplay'>
                    <div class='dontDisplay'>$field_name</div>
                    <input class='dontDisplay' type='text' name='$field_name' value='$field_value'>
                </div>
            ";
        } else if($field_name == 'techID') {
            // open tech select
            echo "
            <div class='formEntry'>
                <div class='fieldName'>Technician</div>
                <select class='fieldInput' name='techID'>
            ";
            // for each tech in the tech query
            $techResult = $techResponse[0];
            
            echo "<option value=' ' selected disabled hidden>Not Assigned</option>";
            
            while($tech = mysqli_fetch_array( $techResult, MYSQLI_ASSOC )) {
                
                $techID = $tech['techID'];
                $techName = $tech['Name'];
                // create an option
                
                
                if($field_value==$techID){ // if this is the incidents tech make it selected
                    
                    echo "<option value='$techID' selected>$techName</option>";
                } else {
                    echo "<option value='$techID'>$techName</option>";
                }
            }
            // close tech select
            echo "
                </select>
            </div>
            ";
            
        } else if($field_name == 'dateClosed') {

                // add row to form
            echo "
            <div class='formEntry'>
                <div class='fieldName'>$field_name</div>
                <input class='fieldInput' type='text' name='$field_name' value='$field_value'>
            ";
            
            if(isset($_GET[$field_name . 'Error'])){
                
                $errorMessage = $_GET[$field_name . 'Error'];
                
                echo "<div class='fieldError'>$errorMessage</div>";
            }
            
            echo "
            </div>
            ";
            
        } else if($field_name == 'customerID' || $field_name == 'productCode' || $field_name == 'dateOpened') {
            
            // add row to form
            echo "
            <div class='formEntry'>
                <div class='fieldName'>$field_name</div>
                <input class='fieldInput' type='text' name='$field_name' value='$field_value' readonly>
            ";
            
            if(isset($_GET[$field_name . 'Error'])){
                
                $errorMessage = $_GET[$field_name . 'Error'];
                
                echo "<div class='fieldError'>$errorMessage</div>";
            }
            
            echo "
            </div>
            ";
            
        } else {
            
            // add row to form
            echo "
            <div class='formEntry'>
                <div class='fieldName'>$field_name</div>
                <input class='fieldInput' type='text' name='$field_name' value='$field_value' required>
            ";
            
            if(isset($_GET[$field_name . 'Error'])){
                
                $errorMessage = $_GET[$field_name . 'Error'];
                
                echo "<div class='fieldError'>$errorMessage</div>";
            }
            
            echo "
            </div>
            ";
        }
    }
    
    // form submit buttons
    echo "
    <div class='buttonContainer'>
        <a href='index.php' class='button grey'>Cancel</a>
        <button type='submit' class='button green'>Update Incident</button>
    </div>
    ";
    
    // end form
    echo "</form>";
}