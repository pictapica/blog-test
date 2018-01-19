<?php require_once(MODEL . 'Comments.php'); ?>
<?php require_once(MODEL . 'Post.php'); ?>

<?php include 'header.php'; ?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.php'; ?>

    <!-- Page Content Holder -->
    <div id="content" class="col-xs-10 col-md-10">
        <?php include 'navbar.php'; ?>
        <h3 >Tous les commentaires bannis</h3><br>
        <div class="panel panel-primary">
            <table class="table table-striped table-condensed">

                <thead>
                    <tr>
                        <th style="width:10%">Auteur</th>
                        <th style="width:50%">Commentaire</th>
                        <th style="width:15%">Date de creation</th>
                        <th style="width:5%">Supprimer</th>
                        <th style="width:5%">Accepter</th><!--Moderation repasse à 0-->
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $allBanCom->fetch()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($data['author']) ?></td>
                            <td><?= htmlspecialchars($data['comment']) ?></td>
                            <td><?= $data['comment_date_fr'] ?></td>
                            <td>
                                <form method="post" action="index.php?c=CommentController&amp;a=deleteBanComment">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Supprimer" title="Supprimer">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">
                                </form>
                            </td>
                            
                            <td>
                                <form method="post" action="index.php?c=CommentController&amp;a=confirmBanComment">
                                <input class="btn btn-info btn-sm" type="submit" value="Accepter" title="Accepter" name="confirmBan">
                                <input type="hidden" name="id" value="<?=$data['id'] ?>">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    $allBanCom->closeCursor();
                    ?>

                </tbody>
            </table>
        </div>
        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>


