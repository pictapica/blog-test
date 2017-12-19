<?php include 'header.php' ;?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.php' ;?>

    <!-- Page Content Holder -->
    <div id="content">
        <?php include 'navbar.php';?>
        <?= $content ?>
        <div class="cRetour"></div>
    </div>
</div>
<?php include 'footer.php'; ?>    