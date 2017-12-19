<?php ob_start(); ?>

<div class="panel panel-primary">
    <table class="table table-striped table-condensed">
        <div class="panel-heading"> 
            <h3 class="panel-title">Tous les billets</h3>
        </div>
        <thead>
            <tr>
                <th style="width:5%">Titre</th>
                <th style="width:40%">Extrait</th>
                <th style="width:10%">Date de creation</th>
                <th>Date de modification</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data = $posts->fetch()) {
                ?> 
                <tr>
                    <td><?= htmlspecialchars($data['title']) ?></td>
                    <td><?= nl2br(htmlspecialchars($data['extrait'])) ?>...</td>
                    <td><?= $data['creation_date_fr'] ?></td>
                    <td><?= $data['update_date_fr'] ?></td>
                    <td style="width:15%">
                        <form method="post" 
                              action="admin.php?path=updateChapter">
                            <input type="button" name="id" value="<?php echo $post->getId(); ?>"/>
                            <input class="submitBillet" type="submit" value="" title="Modifier">
                        </form>
                        <form method="post" action="admin.php?path=deleteChapter">
                            <input type="button" name="id" value="<?php echo $post->getId(); ?>"/>
                            <input class="submitBillet" type="submit" value="" title="Supprimer">
                        </form></td>
                </tr>
                <?php
            }
            $posts->closeCursor();
            ?>

        </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>

<?php
require('template.php');
