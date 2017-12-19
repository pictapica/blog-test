<?php ob_start(); ?>
<div class="row ">
    <section class="col-xs-12 col-md-offset-2 col-md-8">
        <h3>Ajouter un billet</h3>
        <div class="form-group">
            <form class="well-lg form-horizontal" action="admin.php?path=addChapter" method="post">
                <div class="form-group">
                    <label for="title">Titre</label> <br>
                    <input type="text" class="form-control" name="title" required="required">
                </div>
                <div class="form-group">
                    <label for="text">Texte du billet</label>
                    <textarea id="mytextarea" class="form-control" name="content" rows="20" placeholder="Chapitre entier" required="required"></textarea>
                </div>
                
                <input type="submit" formnovalidate="formnovalidate" name="edit" value="Publier" class="btn btn-success">
            </form>
        </div>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); 