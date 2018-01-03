<!DOCTYPE html>
<html>
    <head>
        <title>Jean Forteroche</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="web/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="web/bootstrap/css/custom.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    </head>
    <body>
        <a name="haut" id="haut"></a>
        <div class="wrapper">
            <?php include 'sidebar.php'; ?> 
            <?= $content ?>
            <div class="cRetour"></div>
        </div>

        <?php include 'footer.php'; ?> 