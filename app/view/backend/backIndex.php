<?php

chdir("../../");
require '../app/controler/backend.php';

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } /**elseif ($_GET['action'] == 'addChapter') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    addChapter();
                } elseif ($_GET['action'] == 'deleteChpater') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        deleteChapter();
                    } elseif ($_GET['action'] == 'updateChapter') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            updateChapter();**/
                         else {
                            // Erreur ! On arrête tout, on envoie une exception, donc on saute directement au catch
                            throw new Exception('Aucun identifiant de billet envoyé');
                         }
        
                    } elseif ($_GET['action'] == 'addComment') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                            } else {
                                // Autre exception
                                throw new Exception('Tous les champs ne sont pas remplis !');
                            }
                        } else {
                            // Autre exception
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                    }
                 else {
                    listPosts();
                }
            }
        
    
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}