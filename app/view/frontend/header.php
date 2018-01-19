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
        <script type="text/javascript" src="web/tinyMCE/tinymce.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="web/bootstrap/js/perso.js"></script>
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

