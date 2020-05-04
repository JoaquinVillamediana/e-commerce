$("#create_article_form").submit(function (event) {

    $.each(quillObjects, function (i) {

        var quill = $(this)[0];
        var contentContainer = '#' + quill.container.id + '_content';
        $('#' + quill.container.id + '_error').hide();
        $('#' + quill.container.id).css('border-color', '#ced4da');
        
        if (quill.getLength() <= 1 || quill.container.firstChild.innerHTML.length > 12000) {
            
            $('#' + quill.container.id + '_error').show();
            $('#' + quill.container.id).css('border-color', '#dc3545');
            event.preventDefault();
        }

        if (quill.getLength() > 1) {
            $(contentContainer).val(quill.container.firstChild.innerHTML);
        }
    });

    if (validateArticleForm()) {
        event.preventDefault();
    }

    $('#delete_blocks').val(delBlocks.toString());
    
    //event.preventDefault();
});

function validateArticleForm() {

    $('#type_error').hide();
    $('#type').removeClass('is-invalid');    
    $('#social_tension_id_error').hide();
    $('#social_tension_id').removeClass('is-invalid');    
    $('#trend_error').hide();
    $('#trend_id').removeClass('is-invalid');    
    $('#title_error').hide();
    $('#title').removeClass('is-invalid');
    
    var error = false;

    if ($('#type').val() < 1) {
        $('#type_error').show();
        $('#type').addClass('is-invalid');
        error = true;
    }

    if ($('#type').val() == 1 && $('#social_tension_id').val() < 1) {
        $('#social_tension_id_error').show();
        $('#social_tension_id').addClass('is-invalid');
        error = true;
    }

    if ($('#type').val() == 2 && $('#trend_id').val() < 1) {
        $('#trend_id_error').show();
        $('#trend_id').addClass('is-invalid');
        error = true;
    }

    if ($('#title').val().length < 1 || $('#title').val().length > 250) {
        $('#title_error').show();
        $('#title').addClass('is-invalid');
        error = true;
    }

    $.each(imageObjects, function (i, value) {

        $('#' + value + '_error').hide();
        $('#' + value).removeClass('is-invalid');
        
        if(!$('#' + value).length){
            return;
        }

        var imageName = $('#' + value).val();
        var preview = $('#preview_' + value).html();

        if (imageName.length < 1 && preview.length < 1) {
            $('#' + value + '_error').show();
            $('#' + value).addClass('is-invalid');
            error = true;
            return;
        }

    });

    $.each(videoObjects, function (i, value) {

        $('#' + value + '_error').hide();
        $('#' + value).removeClass('is-invalid');

        if (!$('#' + value).length) {
            return;
        }

        var videoName = $('#' + value).val();
        var preview = $('#preview_' + value).html();

        if (videoName.length < 1 && preview.length < 1) {
            $('#' + value + '_error').show();
            $('#' + value).addClass('is-invalid');
            error = true;
        }
    });

    return error;
}