<?php ob_start(); ?>
<div class='container-fluid'>
    <?php include(VIEW . 'frontend/navbar.php'); ?>
    <div class="row">
        <div class="col-lg-6">
            <h5><a href="index.php">Retour à la liste des billets</a></h5>
        </div>
    </div>
    <section class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <h3>
                <?= htmlspecialchars($post['title']) ?><br />
            </h3>
            <h4><em> <?= $post['creation_date_fr'] ?></em></h4><br /><br/>
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?><br /><br/>
            </p>
        </div>
        <div class="col-lg-1"></div>
    </section>
    <div class="line"></div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10" id="comments">
            <br />
            <?php
            if (empty($comments)) {
                ?>
                <p>Aucun commentaire n'a été posté. Soyez le premier à en laisser un !</p>
                <?php
            }

            while ($comment = $comments->fetch()) {
                ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> - 
                    <Font size="2px" color="#9e9e9e"> Le <?= $comment['comment_date_fr'] ?></Font><br>
                    <?= nl2br(htmlspecialchars($comment['comment']))
                    ?></p>    
                <form action="index.php?c=CommentController&amp;a=report&amp;id=<?= $comment['id'] ?>#comments" method="post">
                    <input type="hidden" name="postId" value="<?= $_GET['id'] ?>"/>
                    <input type="submit" value="Signaler ce commentaire" name="report" onclick="" style ="font-size: 0.7em; color: #ff0000" class=pull-left>

                    <br>
                </form>
                <br><br>
                <?php
            }
            ?>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <div class="line"></div>   
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="comments col-lg-10">
            <h2>Ecrire un commentaires</h2><br>
            <form action="index.php?c=CommentController&amp;a=addComment&amp;id=<?= $_GET['id'] ?>#comments" method="post">
                <input type="hidden" name="postId" value="<?= $_GET['id'] ?>"/>
                <input type="hidden" name="moderation" value=0>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" id="author" placeholder="Votre nom" 
                               name="author" class="form-control"/>
                    </div>
                </div><br /><br /><br />
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea id="comment" name="comment" placeholder=
                                  "Votre messsage" rows="6" class="form-control"></textarea><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-10">
                        <input id="submitcomment" type="submit" value="Envoyer" name="submitcomment" class="btn btn-default">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require(dirname(__FILE__) . '/template.php'); ?>
