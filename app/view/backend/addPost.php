<?php ob_start(); ?>
<div class="row">
    <section class="col-xs-12 col-md-offset-2 col-md-8">
        <h3>Ajouter un billet</h3>
        <div class="form-group">
            <form class="well-lg form-horizontal" action=
                  "index.php?c=PostController&a=addChapter" 
                  method="post">
                <div class="form-group">
                    <label for="title">Titre</label> <br>
                    <input type="text" class="form-control" name="title" required="required">
                </div>
                <div class="form-group">
                    <label for="text">Texte du billet</label>
                    <textarea id="mytextarea" class="form-control" name="content" 
                              rows="20" placeholder="Votre texte ici" required="required"></textarea>
                </div>
               
                <input type="submit" formnovalidate="formnovalidate" name="publier"
                       value="Publier" class="btn btn-primary">
                
                </form>
                
               
            
        </div>
    </section>
</div>
<script>

    BootstrapDialog.show({
    message: 'Vous êtes sur le point de publier votre article!',
            buttons: [{
            label: 'Enregistrer comme brouillon',
                    title: 'Brouillon',
                    action: function(){
                    alert('Test publication!');
                    }
            }, {
            label: 'Publier',
                    title: 'Publier'
                    cssClass: 'btn-primary',
                    action: function(){
                    alert('Test publication!');
                    }
            }, {
            label: 'Close',
                    action: function(dialogItself){
                    dialogItself.close();
                    }
            }]
    });
</script>      
<?php $content = ob_get_clean(); ?>

<?php
require('template.php');