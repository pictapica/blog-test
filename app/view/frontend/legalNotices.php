<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>

<!-- Page Content Holder -->
<div id="content" class=" jumbotronLegalesNotices">
    
    <div class="col-lg-1"></div>
        <div class="col-lg-10">
        <h3>Mentions légales</h3><br>
        <p style="font-size: 1.2em">
         </p>       
    </div>
    <div class="col-lg-1"></div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require(VIEW . 'frontend/template.php'); 


