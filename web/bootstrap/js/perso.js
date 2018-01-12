//configuration of tinyMCE
tinyMCE.init({
    selector: '#mytextarea',
    language: 'fr_FR',
    force_br_newlines: false,
    force_p_newlines: false,
    entity_encoding: "raw",
    forced_root_block: '',

    plugin: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
    ],
    a_plugin_option: true,
    a_configuration_option: 400,

    theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",

    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    content_css: '//www.tinymce.com/css/codepen.min.css'
});

//
$.notify("Enter: Fade In and RightExit: Fade Out and Right", {
    animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
    }
});