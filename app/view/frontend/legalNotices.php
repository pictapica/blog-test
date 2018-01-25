<?php ob_start(); ?>

<!-- Page Content Holder -->
<div id="content" class="jumbotronLegalesNotices">
    <div class="col-lg-5">
        <h3 style="color:#f2eded">Mentions légales</h3><br>
        <p style="font-size: 1.2em; color: #fff">Ce site a été réalisé dans le cadre d'une formation<br>
            Jean FORTEROCHE est un écrivain bien sympathique mais totalement fictif. </p><br><br>
        <p style="font-size: 1.2em; color: #fff">Développement : Alexandra Picard - pictapica@gmail.com<br><br>
            Hébergement : 1&1<br><br>
            Droits d'auteur : A. E. van Vogt<br>
            Textes tirés du livre "Le Monde des A"<br><br>
        </p>
            
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require(dirname(__FILE__) . '/template.php'); 
