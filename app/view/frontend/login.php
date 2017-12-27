<!DOCTYPE html>
<html>
    <head>
        <title>Jean Forteroche</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="web/bootstrap/css/login_form.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    </head>
    <body>
        <div id="login-button">
            <p>Entrez</p>
            <img src="../../../web/images/user.png'" alt ="login">
        </div>
        <div id="container">
            <h1>Connexion</h1>
            <form action="index.php?c=Login&a=login" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo" required value="<?php
                if (isset($_COOKIE['pseudo'])) {
                    echo htmlspecialchars($_COOKIE['pseudo']);
                }
                ?>">
                <input type="password" name="password" placeholder="Mot de Passe" required value="<?php
                if (isset($_COOKIE['password'])) {
                    echo htmlspecialchars($_COOKIE['password']);
                }
                ?>">
                <input type="submit" name="connect" value="Connexion" class="btn-connect">
                <div>
                    <a class="home_link" href ="index.php">Retour à l'accueil du site</a>
                </div>
            </form>
        </div>
        <script>
            $('#login-button').click(function () {
                $('#login-button').fadeOut("slow", function () {
                    $("#container").fadeIn();
                    TweenMax.from("#container", .4, {scale: 0, ease: Sine.easeInOut});
                    TweenMax.to("#container", .4, {scale: 1, ease: Sine.easeInOut});
                });
            });
        </script>
    </body>
</html>
