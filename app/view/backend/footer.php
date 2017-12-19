
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script>
    jQuery(document).ready(function () {
        var duration = 500;
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 100) {
                // Si un défillement de 100 pixels ou plus.
                // Ajoute le bouton
                jQuery('.cRetour').fadeIn(duration);
            } else {
                // Sinon enlève le bouton
                jQuery('.cRetour').fadeOut(duration);
            }
        });

        jQuery('.cRetour').click(function (event) {
            // Un clic provoque le retour en haut animé.
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });
</script>

</body>
</html>
