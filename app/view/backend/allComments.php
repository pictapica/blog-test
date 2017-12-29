

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
                        <th style="width:7%">Auteur</th>
                        <th style="width:40%">Commentaire</th>
                        <th style="width:10%">Date de creation</th>
                        <th style="width:10%">Status</th>
                        <th style="width:30%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $allComments->fetch()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($data['title']) ?></td>
                            <td><?= nl2br(htmlspecialchars($data['extrait'])) ?>...</td>
                            <td><?= $data['creation_date_fr'] ?></td>
                            <td><?= $data['update_date_fr'] ?></td>
                            <td style="width:20%">
                                <form method="post"
                                      action="index.php?c=PostController&a=updateChapter">

                                    <input class="submitBillet" type="submit" value="Modifier" title="Modifier">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="index.php?c=PostController&a=deleteChapter">

                                    <input class="submitBillet" type="submit" value="Supprimer" title="Supprimer">
                                </form>
                            </td>

                        </tr>
                        <?php
                    }
                    $allChapters->closeCursor();
                    ?>

                </tbody>
            </table>
        </div>

        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>

