$(document).on('ready', function(){
    $('#records_categories').on('change', function(){

        var concepts = $('#records_concepts');

        concepts.attr('disabled', true);

        var form = $(this).closest('form');

        var data = $(this).serialize();

        $.ajax({
            url : form.attr('action'),
            type: form.attr('method'),
            data : data,
            success: function(html) {

                concepts.replaceWith($(html).find('#records_concepts'));
            }
        }).done(function(){
            concepts.attr('disabled', false);
        });

    });
});