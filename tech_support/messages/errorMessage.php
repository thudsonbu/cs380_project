<?php

function errorMessage($e) {

    $error_message = $e->getMessage();

    echo "
    <div class='sectionContainer'>
        <div class='errorMessageBox'>
            <div class='errorMessageTitle'>
                An Error Has Occured
            </div>
            <p class='errorMessage'>
                $error_message
            </p>
            <div class='returnButtonContainer'>
                <a href='index.php' class='button grey'>Back</a>
            </div>
        </div>
    </div>
    ";
}

function customErrorMessage($e) {

    echo "
    <div class='sectionContainer'>
        <div class='errorMessageBox'>
            <div class='errorMessageTitle'>
                An Error Has Occured
            </div>
            <p class='errorMessage'>
                $e
            </p>
            <div class='returnButtonContainer'>
                <a href='index.php' class='button grey'>Back</a>
            </div>
        </div>
    </div>
    ";
}

function buttonlessErrorMessage($e) {

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