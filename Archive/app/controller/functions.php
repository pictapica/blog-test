<?php

function setFlash($title, $content, $type) {
    $mess = [
        'title' => $title,
        'content' => $content,
        'type' => $type
    ];
    return $mess;
}

function flashMessage($mess) {
    echo '<h4 class="alert-heading">' . $mess['title'] . '</h4>
            <p id="#flashalert">' . $mess['content'] .
    '</p>';
    unset($mess);
}

function datefr($date) {
    return strftime("%d %m %Y", strtotime($date));
}
