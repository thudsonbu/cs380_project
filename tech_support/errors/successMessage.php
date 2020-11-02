<?php

function successMessage($e) {

    echo "
    <div class='sectionContainer'>
        <div class='successMessageBox'>
            <div class='successMessageTitle'>
                $e
            </div>
            <div class='returnButtonContainer'>
                <a href='index.php' class='button green'>Ok</a>
            </div>
        </div>
    </div>
    ";
}