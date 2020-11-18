<?php

function message($e) {

    echo "
    <div class='sectionContainer'>
        <div class='messageBox'>
            <div class='messageTitle'>
                $e
            </div>
            <div class='returnButtonContainer'>
                <a href='index.php' class='button grey'>Back</a>
            </div>
        </div>
    </div>
    ";
}