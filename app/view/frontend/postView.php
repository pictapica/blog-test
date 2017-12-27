<?php ob_start(); ?>
<div class='container-fluid'>
    <?php include(VIEW . 'frontend/navbar.php');?>
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
            while ($comment = $comments->fetch()) {
                ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> -      
                    <?= nl2br(htmlspecialchars($comment['comment']))
                    ?><br /></p>
                <p><span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    <a href="index.php?c=CommentController&a=report&id=<?= $_GET['id']
            ?>#comments" style ="font-size: 0.7em; color: #e5a5a5"> Signaler</a> - 
                    <FONT size="2px"> Le <?= $comment['comment_date_fr'] ?></FONT></p><br />
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
            <h2>Ecrire un commentaires</h2><br/>
            <form action="index.php?c=CommentController&a=addComment&id=<?= $_GET['id']
            ?>#comments" method="post">
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

<?php require(dirname(__FILE__).'/template.php'); ?>
