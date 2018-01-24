
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
<script>
    $("#notification").click(function(){
    $("error-notification").fadeIn({queue : false).animate({
        right: "20px"
    });  
    $("#error-notification").click(function() {
        $(this).fadeOut(function(){
            $(this).css("right","10px");
        });
    });
</script>


<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="web/bootstrap/js/perso.js"></script>

<script type="text/javascript" src="web/tinyMCE/tinymce.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
       
     
</body>
</html
