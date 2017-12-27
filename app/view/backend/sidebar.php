<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Jean FORTEROCHE</h3>        
    </div>
    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li class="active">
            <a href="index?c=AdminController&a=getIndex" >
                <i class="glyphicon glyphicon-home">&nbsp</i>Accueil</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse"  aria-expanded="false">
                <i class="glyphicon glyphicon-book">&nbsp</i>Billets</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="index.php?c=PostController&a=listAllPosts">Tous les billets</a></li>
                <li><a href="index.php?c=PostController&a=getTinyMce">Nouveau billet</a></li>
            </ul>
        </li>
        <li>
            <a href="#page2Submenu"  data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-comment">&nbsp</i>Commentaires</a>
            <ul class="collapse list-unstyled" id="page2Submenu">
                <li><a href="#">Nouveaux commentaires</a></li>
                <li><a href="#">Tous les commentaires</a></li>
            </ul>
            <a href="#page3Submenu"  data-toggle="collapse" aria-expanded="false">
                <i class="glyphicon glyphicon-exclamation-sign">&nbsp</i>Modération</a>
            <ul class="collapse list-unstyled" id="page3Submenu">
                <li><a href="#">Voir les signalements</a></li>
            </ul>
        </li>
    </ul>
</nav>

