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
            <img src="web/images/user.png" alt ="login" style="margin-top: 6px">
        </div>
        <div id="container">
            <h1>Connexion</h1>
            <form action="index.php?c=LoginController&amp;a=login" method="post">
                <input type="hidden" name="id" value="1">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <input type="password" name="password" placeholder="Mot de Passe" required>
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
