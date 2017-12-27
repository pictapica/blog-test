<?php include 'header.php'; ?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.php'; ?>

    <!-- Page Content Holder -->
    <div id="content" class="col-xs-10 col-md-10">
        <?php include 'navbar.php'; ?>
        <h3 >Tous les billets</h3><br>
        <div class="panel panel-primary">
            <table class="table table-striped table-condensed">

                <thead>
                    <tr>
                        <th style="width:5%">Titre</th>
                        <th style="width:40%">Extrait</th>
                        <th style="width:10%">Date de creation</th>
                        <th>Date de modification</th>
                        <th>Date de modification</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $postsArray->fetch()) {
                        ?> 
                        <tr>
                            <td><?= htmlspecialchars($data['title']) ?></td>
                            <td><?= nl2br(htmlspecialchars($data['extrait'])) ?>...</td>
                            <td><?= $data['creation_date_fr'] ?></td>
                            <td><?= $data['update_date_fr'] ?></td>
                            <td style="width:15%">
                                <form method="post" 
                                      action="index.php?c=PostController&a=">
                                    <input type="button" name="id" value="<?php echo $post->getId(); ?>"/>
                                    <input class="submitBillet" type="submit" value="" title="Modifier">
                                </form>
                                <form method="post" action="admin.php?path=deleteChapter">
                                    <input type="button" name="id" value="<?php echo $post->getId(); ?>"/>
                                    <input class="submitBillet" type="submit" value="" title="Supprimer">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    $postsArray->closeCursor();
                    ?>

                </tbody>
            </table>
        </div>

        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>   


