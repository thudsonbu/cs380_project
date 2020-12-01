<?php

function makeHeader($pageTitle) {

    echo "
    
    <!DOCTYPE html>
    <html>
    <head>
        <!-- Required meta tags -->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    
        <!-- Bootstrap Style Sheets -->
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    
        
        <!-- Icons -->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.15.1/css/all.css' integrity='sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp' crossorigin='anonymous'>
        
        <!-- Custom Font -->
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet'>
    
        <!-- Nav Styles -->
        <link rel='stylesheet' href='../css/theme.css'>
    
        <!-- Custom Styles -->
        <link rel='stylesheet' href='../css/table.css'>
    
        <!-- Custom Styles -->
        <link rel='stylesheet' href='../css/customer.css'>

        <!-- Nav Styles -->
        <link rel='stylesheet' href='./css/theme.css'>
    
        <!-- Custom Styles -->
        <link rel='stylesheet' href='./css/table.css'>
    
        <!-- Custom Styles -->
        <link rel='stylesheet' href='./css/customer.css'>
    
        <!-- EMBEDED STYLES ARE PLACED IN PARTIALS/CREATENAMETABLE -->
        
        <!-- My Icon -->
        <link rel='icon' href='../images/avatar.png'>
    
        <title>SportsPro $pageTitle</title>
    </head>
    
    
    <body>
    ";
}

