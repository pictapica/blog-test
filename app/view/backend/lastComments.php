<?php require_once(MODEL . 'Comments.php'); ?>
<?php require_once(MODEL . 'Post.php'); ?>

<?php include 'header.php'; ?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.php'; ?>

    <!-- Page Content Holder -->
    <div id="content" class="col-xs-10 col-md-10">
        <?php include 'navbar.php'; ?>
        <h3 >Les commentaires des 10 derniers jours</h3><br>
        <div class="panel panel-primary">
            <table class="table table-striped table-condensed">

                <thead>
                    <tr>
                        <th style="width:10%">Auteur</th>
                        <th style="width:50%">Commentaire</th>
                        <!--<th style="width:10%">Chapitre</th>-->
                        <th style="width:15%">Date de creation</th>
                        <th style="width:9%">Status</th>
                        <th style="width:5%">Supprimer</th>
                        <th style="width:5%">Signaler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $lastCom->fetch()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($data['author']) ?></td>
                            <td><?= htmlspecialchars($data['comment']) ?></td>
                            <!--afficher ici le titre du chapitre lié au commentaire  :  $post = new Post();
                            echo $post->getTitle();?>-->
                            
                            <td><?= $data['comment_date_fr'] ?></td>
                            <td><?php if ($data['moderation'] == 0) {
                                    echo 'Non signalé';
                                }elseif ($data['moderation'] == 1) {
                                    echo 'Signalé';
                                }elseif ($data['moderation'] == 2) {
                                    echo 'commentaire banni';
                                }
                                ?> 
                             </td>   
                            
                            <td>
                                <form method="post" action="index.php?c=CommentController&amp;a=deleteLastComment">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Supprimer" title="Supprimer">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">
                                </form>
                            </td>
                            <td><?php if ($data['moderation'] == 0) { ?>
                                <form method="post" action="index.php?c=CommentController&amp;a=lastReport">
                                    <input class="btn btn-warning btn-sm" type="submit" value="Signaler" title="Signaler" name="lastreport">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">
                                </form>
                            <?php 
                            } ?>
                            </td>
                        </tr>
                        <?php
                    }
                    $lastCom->closeCursor();
                    ?>

                </tbody>
            </table>
        </div>

        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>


