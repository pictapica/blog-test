<?php


function logout(){
    if(session_id() == '') { // start session if none found
        session_start();
    }

    session_unset();         
    session_destroy();
    unset($_SESSION['loggedIn']);
    header('Location:../view/frontend/index.php');
}
