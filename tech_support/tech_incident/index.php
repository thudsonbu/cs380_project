<!-- SESSION DETECTION AND PAGE HEADER -->
<?php 
// SESSION DETECTION
require '../session/sessionConfig.php';

if($_SESSION['permission'] != 'tech'){ // if they are not an admin they cannot access

    header('Location:../userAuth/techLoginPage.php?error=Access Denied');
}


// MAKE HEADER METHOD
require '../view/header.php';
// CREATE HEADER WITH PAGE TITLE
makeHeader('Tech Incident');
?>

<!-- RESPONSIVE NAVBAR -->
<?php
    require '../view/nav.php'
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer '>
    <div class='pageTitle'>
        Select Incidents
    </div>

		   			
		<div class='sectionContainer'>
		
		<?php
		// this is used to check if there was a message
		// the message would be either updated succesfully or reports an error
		if (!empty($_GET['message'])) {
		    
		    $message = $_GET['message'];
		    
		    require "../messages/successMessage.php";
		    
		    successMessage($message);
		    
		}
		
		if (!empty($_GET['error'])) {
		    
		    $error = $_GET['error'];
		    
		    require "../messages/errorMessage.php";
		    
		    customErrorMessage($error);
		    
		}
		?>
		</div>  
    </div>  
		
 
    <div class='sectionContainer'>
        <div class='tableContainer'>
            <?php
            $techID = $_SESSION['techID'];
            
            require "../model/incident/getTechIncident.php";
            
            $out = getTechIncident($techID);
            
            require "techIncidentTable.php";
            
            echo "You are logged in as ". $_SESSION['user'] ."";
            
         
            ?>
        </div>
    </div>
   
<?php

require '../view/footer.php';

?>