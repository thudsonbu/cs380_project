<?php 
function registerErrorMessage($e) {

    echo "
    <div class='sectionContainer'>
        <div class='errorMessageBox'>
            <div class='errorMessageTitle'>
                $e
            </div>
        </div>
    </div>
    ";
}