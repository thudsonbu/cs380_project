<?php
if (isset($_SESSION['email'])){
    
    if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
        
        unset($_SESSION["email"]);
        unset($_SESSION["first"]);
        unset($_SESSION["last"]);
        unset($_SESSION["id"]);
        session_destroy();
        
        //redirect to logout.php
        header("Location: ../index.php?error='You have been logged out due to inactivity.'");
    } else{ //if we haven't expired:
        $_SESSION['last_activity'] = time(); //this was the moment of last activity.
    }
} else 
    return ;
?>