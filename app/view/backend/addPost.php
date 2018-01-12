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



                </div>
                <input type="submit"  formnovalidate="formnovalidate" name="draft"  value="Enregistrer comme brouillon" 
                       class="btn btn-warning btn-sm" >
                <input type="hidden" name="post" >
                <input type="hidden" name="published" >
                <input type="submit"  formnovalidate="formnovalidate" name="publish" value="Publier" class="btn btn-info btn-sm" >
                        <!-- Modal -->
                <!--<div id="myModal" class="modal fade">
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
                                <a href="index.php?c=PostController&amp;a=addChapter"  class="btn btn-info" name="draft">Non, enregistrer comme brouillon</a>
                                <a href="index.php?c=PostController&amp;a=addChapter" name="publish" class="btn btn-danger">Oui, publier!</a>
                                <input type="hidden" name="post" >
                                <input type="hidden" name="published" >
                            </div>
                        </div>
                    </div>
                </div> -->  
            </form>
            

              


        </div>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php
require('template.php');
