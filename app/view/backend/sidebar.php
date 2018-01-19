<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Jean FORTEROCHE</h3>        
    </div>
    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li class="active">
            <a href="index?c=AdminController&amp;a=getIndex" >
                <i class="glyphicon glyphicon-home">&nbsp</i>Accueil</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse"  aria-expanded="false">
                <i class="glyphicon glyphicon-book">&nbsp</i>Billets</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="index.php?c=PostController&amp;a=listAllPosts">Tous les billets</a></li>
                <li><a href="index.php?c=PostController&amp;a=getTinyMce">Nouveau billet</a></li>
            </ul>
        </li>
        <li>
            <a href="#page2Submenu"  data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-comment">&nbsp</i>Commentaires</a>
            <ul class="collapse list-unstyled" id="page2Submenu">
                <li><a href="index.php?c=CommentController&amp;a=listLastComments">Derniers commentaires</a></li>
                <li><a href="index.php?c=CommentController&amp;a=listAllComments">Tous les commentaires</a></li>
            </ul>
            <a href="#page3Submenu"  data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-exclamation-sign">&nbsp</i>Modération</a>
            <ul class="collapse list-unstyled" id="page3Submenu">
                <li><a href="index.php?c=CommentController&amp;a=listAllSignalComments">Signalements</a></li>
                <li><a href="index.php?c=CommentController&amp;a=listAllBanComments">Commentaires bannis</a></li>
            </ul>
        </li>
    </ul>
</nav>

