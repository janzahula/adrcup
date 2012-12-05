$(document).ready(function () {
    
    $("textarea.ckedit").each(function () {

        var el = $(this);
        el.attr('required', null); // fixes http://dev.ckeditor.com/ticket/8031
        el.ckeditor(
            {
                customConfig: "ckeditor_config.js",
                language: $('html').attr('lang')
            }
        );
    });

    $('form').submit(function() {
        for (var inst in CKEDITOR.instances)
            CKEDITOR.instances[inst].updateElement();
    });
});