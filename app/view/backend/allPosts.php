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
                    <?php foreach ($allChapters as $post): ?>
                    
                        <tr>
                            <td><?php echo $post->getTitle(); ?></td>
                            <td><?php echo $post->getExcerpt(270); ?></td>
                            <td><?php echo datefr($post->getDate()); ?></td>
                            <td><?php echo datefr($post->getUpdateDate()); ?></td>
                            <td >
                                <form method="post"
                                      action="index.php?c=PostController&amp;a=updateChapter">

                                    <input class="btn btn-warning btn-sm" type="submit" value="Modifier" title="Modifier">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="index.php?c=PostController&amp;a=deleteChapter">
                                    <input type="hidden" name="id" value="<?php $data['id'] ?>">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Supprimer" title="Supprimer">
                                    
                                </form>
                            </td>

                            <td><!--Ne doit s'afficher que si le commentaire est un brouillon sinon affiche "Publié"
                                si published a pour valeur = 2 on affiche publié sinon on affiche ça : -->
                                <?php if ($post->getPublished() == 2) {
                                    echo 'Déjà publié !';
                                }else {?>
                                <form method="post" action="index.php?c=PostController&amp;a=publiChapter">

                                    <input class="btn btn-info btn-sm" type="submit" value="Publier" title="Publier">
                                </form>
                                <?php }
                                ?>
                            </td>

                        </tr>
                        <?php
        endforeach;
        ?>

                </tbody>
            </table>
        </div>

        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>


