//configuration of tinyMCE
tinyMCE.init({
    selector: '#mytextarea',
    language: 'fr_FR',
    force_br_newlines: false,
    force_p_newlines: false,
    entity_encoding: "raw",
    forced_root_block: ''

    
});

//
$.notify("Enter: Fade In and RightExit: Fade Out and Right", {
    animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
    }
});