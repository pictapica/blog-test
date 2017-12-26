<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');
require_once(MODEL . 'userManager.php');

Class AdminController {

    public function getlogin() {
        $userManager = new UserManager();

        if (isset($_POST['connect'])) {
            if (empty($_POST['pseudo']) && empty($_POST['password'])) {

                $mess = setFlash('Vous avez oublié de vous identifier...', 'warning');
                header('refresh: 2; login');
            }
            if (empty($_POST['pseudo'])) {

                $mess = setFlash('Vous avez oublié votre pseudo... ', 'warning');
                header('refresh : 2; url:../view/frontend/login.php?message=no_pseudo');
                exit();
            } elseif (empty($_POST['password'])) {

                $mess = setFlash('Vous avez oublié votre mot de passe... ', 'warning');
                header('refresh : 2; url:../view/frontend/login.php?message=no_password');
                exit();
            } else {

                $pseudo = htmlspecialchars($_POST['pseudo']);
                $pwdsecure = md5($_POST['password']);

                //Hachage du mot de passe
                $pass_hash = md5($_POST['password']);
                if ($pwdsecure == $pass_hash) {
                    //vérification des identifiants
                    $result = $userManager->connect($_POST['pseudo'], $_POST['password']);
                    if (!isset($result)) {
                        header('Refresh:2, url=../view/frontend/login.php?message=internal_error');
                        echo'Mauvais identifiant ou mot de passe !';
                    } else {
                        session_start();
                        $_SESSION['id'] = $result['user_id'];
                        $_SESSION['pseudo'] = $result['pseudo'];
                        echo 'Vous êtes connecté !';

                        header('Location: controller/backend.php');
                    }
                }
            }
        }
        include_once(VIEW . '/frontend/login.php');
    }

    public function listPosts() {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $posts = $postManager->getPosts();


        include(VIEW . 'backend/allposts.php');
    }

    function post() {
        $postManager = new PostManager();
        $CommentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $CommentManager->getComments($_GET['id']);

        require(VIEW . 'backend/post.php');
    }

    function addChapter() {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];

        if ((!empty($title)) && (!empty($content))) {
            $post = new post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId('1');

            $chapAdd = new PostManager();
            $addChapter = $postManager->addPost($post);

            header('Location: editPost.php');
        }
    }

    function deleteChapter() {
        $id = htmlspecialchars($_POST['id']);

        if (!empty($id)) {

            $deleteChap = new PostManager();
            $chapDelete = $deleteChap->deletePost($id);

            header('Location : admin.php?action=editPost');
        }
    }

    function updateChapter() {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];
        $id = htmlspecialchars($_POST['id']);

        if ((!empty($titre)) && (!empty($content)) && (!empty($id))) {
            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId('1');

            $chapUpdate = new PostManager();
            $updateChapter = $chapUpdate->updatePost($post);

            header('Location : admin.php?action=editPost');
        }
    }

    function updateComment() {
        $commentmanager = new CommentManager();
        $commentmanager->updateComment($_POST['author'], $_POST['comment'], $_GET['id']);
        header('Location: chapters.php');
    }

    function deleteComment($getid) {
        $commentmanager = new CommentManager();
        $comment = $commentManager->deleteComment($_GET['id']);

        header('Location : admin.php?action=deleteComment');
    }

// Reporte les commentaires signalés
    function reportComment($postId, $id) {
        if (isset($report)) {

            if ($CommentManager->signaledComment($signal) == FALSE) {
                $CommentManager->reportcomment($moderation);
                $CommentManager->validate($id);
            } else {
                $CommentManager->updateSignaled();
                echo'Attention message déjà signalé';
            }
        }


        header('Location: index.php?action=comment&id=' . $postId, $id);
    }

}
