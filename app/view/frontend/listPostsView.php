<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <header class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <h1>BILLET SIMPLE POUR L'ALASKA</h1><br /><br />
            <p>J'ai voulu ce blog telle une page blanche. Simple, sobre, épuré.  
                Rien ne vous distraira dans votre lecture à part peut-être la
                frustration de ne pas pouvoir lire le chapitre suivant assez vite... 
                Vous allez pouvoir découvrir ici les épisodes de mon
                nouveau livre. Il s'agira pour moi de vous poster le plus régulièrement possible 
                les chapitres qui constitueront ce roman pour
                que vous puissiez suivre ma progression.  
                N'hésitez pas à commenter, je serais très heureux
                d'avoir votre retour. Bonne lecture à vous.
            </p>
        </div>
        <div class="col-lg-1"></div>
    </header>
    <br /><br /><br />
    <section class="blog-container">
        
        <?php
        while ($data = $posts->fetch()) {
            ?>
            <div class="blog-card col-lg-12" style="background: url(web/images/pic<?= $data['id']?>.jpg) center no-repeat;">
                <div id="container" class="container">
                    <div class="post">
                        <div class="title-content">
                            <h3>
                                <?= htmlspecialchars($data['title']) ?>

                            </h3>
                        </div>
                        <div class="card-info">
                            <p>
                                <?= nl2br(htmlspecialchars($data['extrait'])) ?>...
                                <br /><br /><br />
                            </p>
                            <em><a href="index.php?action=post&amp;id=<?= $data['id']
                                ?>">Lire la suite<span class="licon icon-black"></span></a></em>
                        </div>
                        <div class="utility-info">
                            <ul class="utility-list">
                                <li><span class="licon icon-com"></span>
                                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>#comments">Commentaires</a></li>
                                <li><span class="licon icon-dat"></span><em> <?= $data['creation_date_fr'] ?></em></li>
                            </ul>
                        </div>
                        <div class="gradient-overlay"></div>
                        <div class="color-overlay"></div>
                    </div>
                </div>
            </div>
            <?php
        }
        $posts->closeCursor();
        ?>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require(dirname(__FILE__).'/template.php'); ?>
