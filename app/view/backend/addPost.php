<?php ob_start(); ?>
<div class="row">
    <section class="col-xs-12 col-md-offset-2 col-md-8">
        <h3>Ajouter un billet</h3>
        <div class="form-group">
            <form class="well-lg form-horizontal" action=
                  "index.php?c=PostController&amp;a=addChapter" 
                  method="post">
                <div class="form-group">
                    <label for="title">Titre</label> <br>
                    <input type="text" class="form-control" name="title" required>

                </div>
                <div class="form-group">
                    <label for="text">Texte du billet</label>
                    <textarea id="mytextarea" class="form-control" name="content" 
                              rows="20" placeholder="Votre texte ici" required></textarea>

                    <input type="hidden" name="post" >

                </div>
                <input type="submit" formnovalidate="formnovalidate" name="brouillon" value="Enregistrer comme brouillon" class="btn btn-warning btn-sm">
                <input type="submit" formnovalidate="formnovalidate" name="publier"
                       value="Publier" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-backdrop="false">

            </form>
            <!-- Trigger the modal with a button -->


            <!-- Modal -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">			
                            <h4 class="modal-title">Confirmation</h4>	
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Etes-vous sûr de vouloir publier votre billet ? </p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-info" data-dismiss="modal">Non, enregistrer comme brouillon</a>
                            <a href="#" class="btn btn-danger">Oui, publier!</a>
                        </div>
                    </div>
                </div>
            </div>     


        </div>
    </section>
</div>
<script>

    BootstrapDialog.show({
    message: 'Vous êtes sur le point de publier votre article!',
            buttons: [{
            label: 'Enregistrer comme brouillon',
                    title: 'Brouillon',
                    action: function (){
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
