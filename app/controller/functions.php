<?php

function datefr($date) {
   return strftime("%d/%m/%Y à %Hh%M", strtotime($date));
}

function setFlash($titre, $message, $type) {
    $mess = [
        'titre' => $titre,
        'message' => $message,
        'type' => $type
    ];
    return $mess;
}

function flashMessage($mess) {
    echo '<h4 class="alert-heading">' . $mess['titre'] . '</h4>
            <p id="#flashalert">' . $mess['message'] .
    '</p>';
    unset($mess);
}
