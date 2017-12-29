<?php require_once(MODEL . 'Post.php'); ?>

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
                        <th style="width:10%">Titre</th>
                        <th style="width:45%">Extrait</th>
                        <th style="width:12%">Date de creation</th>
                        <th style="width:12%">Date de modification</th>
                        <th style="width:7%">Action</th>
                        <th style="width:7%">Action</th>
                        <th style="width:7%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $allChapters->fetch()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($data['title']) ?></td>
                            <td><?= nl2br(htmlspecialchars($data['extrait'])) ?>...</td>
                            <td><?= $data['creation_date_fr'] ?></td>
                            <td><?= $data['update_date_fr'] ?></td>
                            <td >
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

                            <td>
                                    <form method="post" action="index.php?c=PostController&a=publiChapter">

                                    <input class="submitBillet" type="submit" value="Publier" title="Publier">
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


