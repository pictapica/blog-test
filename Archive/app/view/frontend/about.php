<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>

<!-- Page Content Holder -->
<div id="content" class=" jumbotron">
    <div class="col-lg-5">
        <h3>Jean FORTEROCHE</h3><br>
        <p style="font-size: 1.2em">Jean FORTEROCHE est un écrivain canadien de science-fiction.
Il est considéré comme l'un des chefs de file de la science-fiction américaine 
pendant son âge d'or, avec des chefs-d'œuvre comme les romans À la poursuite des 
Slans, La Faune de l'espace et Le Monde des Ā ; ce dernier ouvrage a popularisé 
la sémantique générale auprès du public et provoqué une importante polémique dans 
le monde de la science-fiction anglo-saxonne.
La traduction française du Monde des Ā, effectuée par Boris Vian, a grandement 
contribué à lancer la science-fiction en France. </p>       
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require(VIEW . 'frontend/template.php'); 


