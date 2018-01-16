//configuration of tinyMCE
tinyMCE.init({
    selector: '#mytextarea',
    language: 'fr_FR',
    force_br_newlines: false,
    force_p_newlines: false,
    entity_encoding: "raw",
    forced_root_block: ''

    
});


$(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });

jQuery(document).ready(function () {
        var duration = 500;
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 50) {
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
        });
    });
    

$("#notification").click(function(){
    $("error-notification").fadeIn();
});