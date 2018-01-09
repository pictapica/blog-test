<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <header class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <h1>BILLET SIMPLE POUR L'ALASKA</h1><br><br>
            <blockquote style="text-align: justify">J'ai voulu ce blog telle une page blanche. Simple, sobre, épuré.  
                Rien ne vous distraira dans votre lecture à part peut-être la
                frustration de ne pas pouvoir lire le chapitre suivant assez vite... 
                Vous allez pouvoir découvrir ici les épisodes de mon
                nouveau livre. Il s'agira pour moi de vous poster le plus régulièrement possible 
                les chapitres qui constitueront ce roman pour
                que vous puissiez suivre ma progression.  
                N'hésitez pas à commenter, je serais très heureux
                d'avoir votre retour. <br>Bonne lecture à vous.<br> 
                <small class="pull-right">Jean FORTEROCHE</small>
            </blockquote>
        </div>
        <div class="col-lg-1"></div>
    </header>
    <br /><br /><br />
    <section class="blog-container">

        <?php foreach ($posts as $post): ?> 
            <div class="blog-card col-lg-12" 
                 style="background: url(web/images/pic<?php echo $post->getId(); ?>.jpg) center no-repeat;">
                <div id="container" class="container">
                    <div class="post">
                        <div class="title-content">
                            <h3>
                                <?php echo $post->getTitle(); ?>

                            </h3>
                        </div>
                        <div class="card-info">
                            <p>
                                <?php echo $post->getExcerpt(); ?>
                                <br /><br /><br />
                            </p>
                            <em><a href="index.php?c=PostController&amp;a=post&amp;id=<?php echo $post->getId();?>">Lire la suite<span class="licon icon-black"></span></a></em>
                        </div>
                        <div class="utility-info">
                            <ul class="utility-list">
                                <li><span class="licon icon-com"></span>
                                    <a href="index.php?c=PostController&a=post&id=<?php echo $post->getId();
                                ?>#comments"><?php echo $post->getNbComment();?>  Commentaires</a></li>
                                <li><span class="licon icon-dat"></span><em> <?php echo datefr($post->getDate()); ?></em></li>
                            </ul>
                        </div>
                        <div class="gradient-overlay"></div>
                        <div class="color-overlay"></div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); 
