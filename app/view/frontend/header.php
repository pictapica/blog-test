<!DOCTYPE html>
<html>
    <head>
        <title>Jean Forteroche</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap-grid.css">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="web/bootstrap/css/modal_fade.css" />
        <link rel="stylesheet" href="web/bootstrap/css/custom.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/
              font-awesome.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="web/images/favicon.png"/> 
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="web/images/favicon.ico" /><![endif]-->

    </head>
    <body>
        <a name="haut" id="haut"></a>
        <div class="wrapper">
            <div id="divflash" class="alert alert-<?php
            if (isset($mess)) {
                echo
                $mess['type'];
            };
            ?>">
                <a id="close" class="close">x</a>
                <div id="flashcontent"><?php
                    if (isset($mess)) {
                        echo flashMessage($mess);
                    }
                    ?></div>
            </div>

