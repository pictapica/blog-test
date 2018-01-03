<?php include 'header.php' ;?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.php' ;?>

    <!-- Page Content Holder -->
    <div id="content" class="col-xs-10 col-md-10">
        <?php include 'navbar.php';?>
        <?= $content ?>
        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>    