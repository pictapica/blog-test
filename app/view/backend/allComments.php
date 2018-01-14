<?php require_once(MODEL . 'Comments.php'); ?>
<?php require_once(MODEL . 'Post.php'); ?>

<?php include 'header.php'; ?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.php'; ?>

    <!-- Page Content Holder -->
    <div id="content" class="col-xs-10 col-md-10">
        <?php include 'navbar.php'; ?>
        <h3 >Tous les commentaires</h3><br>
        <div class="panel panel-primary">
            <table class="table table-striped table-condensed">

                <thead>
                    <tr>
                        <th style="width:10%">Auteur</th>
                        <th style="width:50%">Commentaire</th>
                        <!--<th style="width:10%">Chapitre</th>-->
                        <th style="width:15%">Date de creation</th>
                        <!--<th style="width:5%">Status</th>-->
                        <th style="width:5%">Supprimer</th>
                        <th style="width:5%">Signaler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $allCom->fetch()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($data['author']) ?></td>
                            <td><?= htmlspecialchars($data['comment']) ?></td>
                            <!--<td>afficher ici le titre du chapitre lié au commentaire  :  $post = new Post();
                            echo $post->getTitle();?>
                            </td> -->
                            <td><?= $data['comment_date_fr'] ?></td>
                            
                            
                            <td>
                                <form method="post" action="index.php?c=CommentController&amp;a=deleteComment">

                                    <input class="btn btn-danger btn-sm" type="submit" value="Supprimer" title="Supprimer" name="delete">
                                    <input type="hidden" name="getId" value="<?php $getId ?>">
                                </form>
                            </td>
                            <td><?php if ($data['moderation'] == 1) { 
                                echo 'Signalé';
                                }else{ ?>   
                                <form method="post" action="index.php?c=CommentController&amp;a=allModeratedComment">
                                    <input class="btn btn-warning btn-sm" type="submit" value="Signaler" title="Signaler">
                                </form>
                            <?php 
                            } ?>
                            </td>
                        </tr>
                        <?php
                    }
                    $allCom->closeCursor();
                    ?>

                </tbody>
            </table>
        </div>

        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>


