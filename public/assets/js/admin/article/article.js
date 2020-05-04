var currentBlock = '';
var customBoxCount = 0;
var currentOrder = 0;
var quillObjects = new Array();
var imageObjects = new Array();
var videoObjects = new Array();
var delBlockButtonId = 0;
var delBlocks = new Array();

$(document).on('click', '.add_custom_block', function () {
    currentBlock = $(this);
    $('#addCustomBlockModal').modal('show');
});

$(document).on('click', '.custom_block_modal_item', function () {
    addArticleBlock($(this).data("type"));
    $('#addCustomBlockModal').modal('hide');
});

$('#add_block').change(function () {
    addArticleBlock($(this).val());
});

function addArticleBlock(option, blockId = "", text = "", file_1 = "", file_2 = "") {

    if (option == "") {
        return true;
    }

    if (blockId > 0) {
        customBoxCount = blockId;
        currentOrder++;
    } else {
        customBoxCount++;
        currentOrder = parseInt(currentBlock.data("order"));
    }

    switch (option) {
        case 1:
            addTextBlock(text);
            break;
        case 2:
            addImageBlock(file_1);
            break;
        case 3:
            addVideoBlock(file_1);
            break;
        case 4:
            addTextImageBlock(text, file_1);
            break;
        case 5:
            addImageTextBlock(text, file_1);
            break;
        case 6:
            addTextVideoBlock(text, file_1);
            break;
        case 7:
            addVideoTextBlock(text, file_1);
            break;
        case 8:
            addImageVideoBlock(file_1, file_2);
            break;
        case 9:
            addVideoImageBlock(file_1, file_2);
            break;
        case 10:
            addImageImageBlock(file_1, file_2);
            break;
        case 11:
            addVideoVideoBlock(file_1, file_2);
            break;
    }

    $('#custom_block_' + customBoxCount).after(getAddBlockBtn());
}

function addTextBlock(text) {

    var textBlock = '';

    textBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    textBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    textBlock += getTextBlock('1', 'center', text);
    textBlock += getRemoveBlockBtn();
    textBlock += '</div>';

    if (text.length > 0) {
        $('#custom_article_block').append(textBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(textBlock).children(':last').hide().fadeIn();
    }

    initTextEditor('1', 'center');
}

function addImageBlock(file_1) {

    var imageBlock = '';

    imageBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    imageBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    imageBlock += getImageBlock('2', 'center', file_1);
    imageBlock += getRemoveBlockBtn();
    imageBlock += '</div>';

    if (file_1.length > 0) {
        $('#custom_article_block').append(imageBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(imageBlock).children(':last').hide().fadeIn();
    }
}

function addVideoBlock(file_1) {

    var videoBlock = '';

    videoBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    videoBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    videoBlock += getVideoBlock('3', 'center', file_1);
    videoBlock += getRemoveBlockBtn();
    videoBlock += '</div>';

    if (file_1.length > 0) {
        $('#custom_article_block').append(videoBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(videoBlock).children(':last').hide().fadeIn();
    }

}

function addTextImageBlock(text, file_1) {

    var textImageBlock = '';

    textImageBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    textImageBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    textImageBlock += '<div class="form-row">';
    textImageBlock += '<div class="col-md-6" style="height:50%;">';
    textImageBlock += getTextBlock('4', 'left', text);
    textImageBlock += '</div>';
    textImageBlock += '<div class="col-md-6">';
    textImageBlock += getImageBlock('4', 'right', file_1);
    textImageBlock += '</div>';
    textImageBlock += '</div>';
    textImageBlock += getRemoveBlockBtn();
    textImageBlock += '</div>';

    if (text.length > 0) {
        $('#custom_article_block').append(textImageBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(textImageBlock).children(':last').hide().fadeIn();
    }

    initTextEditor('4', 'left');
}

function addImageTextBlock(text, file_1) {

    var imageTextBlock = '';

    imageTextBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    imageTextBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    imageTextBlock += '<div class="form-row">';
    imageTextBlock += '<div class="col-md-6">';
    imageTextBlock += getImageBlock('5', 'left', file_1);
    imageTextBlock += '</div>';
    imageTextBlock += '<div class="col-md-6" style="height:50%;">';
    imageTextBlock += getTextBlock('5', 'right', text);
    imageTextBlock += '</div>';
    imageTextBlock += '</div>';
    imageTextBlock += getRemoveBlockBtn();
    imageTextBlock += '</div>';

    if (text.length > 0) {
        $('#custom_article_block').append(imageTextBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(imageTextBlock).children(':last').hide().fadeIn();
    }

    initTextEditor('5', 'right');
}

function addTextVideoBlock(text, file_1) {

    var textVideoBlock = '';

    textVideoBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    textVideoBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    textVideoBlock += '<div class="form-row">';
    textVideoBlock += '<div class="col-md-6" style="height:50%;">';
    textVideoBlock += getTextBlock('6', 'left', text);
    textVideoBlock += '</div>';
    textVideoBlock += '<div class="col-md-6">';
    textVideoBlock += getVideoBlock('6', 'right', file_1);
    textVideoBlock += '</div>';
    textVideoBlock += '</div>';
    textVideoBlock += getRemoveBlockBtn();
    textVideoBlock += '</div>';

    if (text.length > 0) {
        $('#custom_article_block').append(textVideoBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(textVideoBlock).children(':last').hide().fadeIn();
    }

    initTextEditor('6', 'left');
}

function addVideoTextBlock(text, file_1) {

    var videoTextBlock = '';

    videoTextBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    videoTextBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    videoTextBlock += '<div class="form-row">';
    videoTextBlock += '<div class="col-md-6">';
    videoTextBlock += getVideoBlock('7', 'left', file_1);
    videoTextBlock += '</div>';
    videoTextBlock += '<div class="col-md-6" style="height:50%;">';
    videoTextBlock += getTextBlock('7', 'right', text);
    videoTextBlock += '</div>';
    videoTextBlock += '</div>';
    videoTextBlock += getRemoveBlockBtn();
    videoTextBlock += '</div>';

    if (text.length > 0) {
        $('#custom_article_block').append(videoTextBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(videoTextBlock).children(':last').hide().fadeIn();
    }

    initTextEditor('7', 'right');
}

function addImageImageBlock(file_1, file_2) {

    var imageImageBlock = '';

    imageImageBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    imageImageBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    imageImageBlock += '<div class="form-row">';
    imageImageBlock += '<div class="col-md-6">';
    imageImageBlock += getImageBlock('10', 'left', file_1);
    imageImageBlock += '</div>';
    imageImageBlock += '<div class="col-md-6">';
    imageImageBlock += getImageBlock('10', 'right', file_2);
    imageImageBlock += '</div>';
    imageImageBlock += '</div>';
    imageImageBlock += getRemoveBlockBtn();
    imageImageBlock += '</div>';

    if (file_1.length > 0) {
        $('#custom_article_block').append(imageImageBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(imageImageBlock).children(':last').hide().fadeIn();
    }
}

function addImageVideoBlock(file_1, file_2) {

    var imageVideoBlock = '';

    imageVideoBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    imageVideoBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    imageVideoBlock += '<div class="form-row">';
    imageVideoBlock += '<div class="col-md-6">';
    imageVideoBlock += getImageBlock('8', 'left', file_1);
    imageVideoBlock += '</div>';
    imageVideoBlock += '<div class="col-md-6">';
    imageVideoBlock += getVideoBlock('8', 'right', file_2);
    imageVideoBlock += '</div>';
    imageVideoBlock += '</div>';
    imageVideoBlock += getRemoveBlockBtn();
    imageVideoBlock += '</div>';

    if (file_1.length > 0) {
        $('#custom_article_block').append(imageVideoBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(imageVideoBlock).children(':last').hide().fadeIn();
    }
}

function addVideoImageBlock(file_1, file_2) {

    var videoImageBlock = '';

    videoImageBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    videoImageBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    videoImageBlock += '<div class="form-row">';
    videoImageBlock += '<div class="col-md-6">';
    videoImageBlock += getVideoBlock('9', 'left', file_1);
    videoImageBlock += '</div>';
    videoImageBlock += '<div class="col-md-6">';
    videoImageBlock += getImageBlock('9', 'right', file_2);
    videoImageBlock += '</div>';
    videoImageBlock += '</div>';
    videoImageBlock += getRemoveBlockBtn();
    videoImageBlock += '</div>';

    if (file_1.length > 0) {
        $('#custom_article_block').append(videoImageBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(videoImageBlock).children(':last').hide().fadeIn();
    }
}

function addVideoVideoBlock(file_1, file_2) {

    var videoVideoBlock = '';

    videoVideoBlock += '<div id="custom_block_' + customBoxCount + '" class="form-group custom_block_form_group">';
    videoVideoBlock += '<input type="hidden" class="block_order" id="block_order_' + customBoxCount + '" name="block_order_' + customBoxCount + '" value="' + currentOrder + '"/>';
    videoVideoBlock += '<div class="form-row">';
    videoVideoBlock += '<div class="col-md-6">';
    videoVideoBlock += getVideoBlock('11', 'left', file_1);
    videoVideoBlock += '</div>';
    videoVideoBlock += '<div class="col-md-6">';
    videoVideoBlock += getVideoBlock('11', 'right', file_2);
    videoVideoBlock += '</div>';
    videoVideoBlock += '</div>';
    videoVideoBlock += getRemoveBlockBtn();
    videoVideoBlock += '</div>';

    if (file_1.length > 0) {
        $('#custom_article_block').append(videoVideoBlock).children(':last').hide().fadeIn();
    } else {
        setCustomBlockOrder();
        currentBlock.parent().after(videoVideoBlock).children(':last').hide().fadeIn();
    }
}

function getTextBlock(type, position, text) {

    var textBlock = '';

    textBlock += '<label>Texto</label>';
    textBlock += '<div id="toolbar-container_' + customBoxCount + '" style="border-radius:.25rem;">';
    textBlock += '<span class="ql-formats">';
    textBlock += '<select class="ql-size"></select>';
    textBlock += '</span>';
    textBlock += '<span class="ql-formats">';
    textBlock += '<button class="ql-bold"></button>';
    textBlock += '<button class="ql-italic"></button>';
    textBlock += '<button class="ql-underline"></button>';
    textBlock += '<button class="ql-strike"></button>';
    textBlock += '</span>';
    textBlock += '<span class="ql-formats">';
    textBlock += '<select class="ql-color"></select>';
    textBlock += '<select class="ql-background"></select>';
    textBlock += '</span>';
    textBlock += '<span class="ql-formats">';
    textBlock += '<button class="ql-header" value="1"></button>';
    textBlock += '<button class="ql-header" value="2"></button>';
    textBlock += '<button class="ql-blockquote"></button>';
    textBlock += '<button class="ql-code-block"></button>';
    textBlock += '</span>';
    textBlock += '<span class="ql-formats">';
    textBlock += '<button class="ql-list" value="ordered"></button>';
    textBlock += '<button class="ql-list" value="bullet"></button>';
    textBlock += '<button class="ql-indent" value="-1"></button>';
    textBlock += '<button class="ql-indent" value="+1"></button>';
    textBlock += '</span>';
    textBlock += '<span class="ql-formats">';
    textBlock += '<button class="ql-direction" value="rtl"></button>';
    textBlock += '<select class="ql-align"></select>';
    textBlock += '</span>';
    textBlock += '<span class="ql-formats">';
    textBlock += '<button class="ql-link"></button>';
    textBlock += '</span>';
    textBlock += '</div>';
    //textBlock += '<div id="editor-container" style="border-radius:.25rem;">{!! old("content") !!}</div>';
    textBlock += '<div id="' + position + '_' + type + '_editor-container_' + customBoxCount + '" style="border:1px solid #ced4da; border-radius:.25rem; margin-top:5px;">' + text + '</div>';
    textBlock += '<input type="hidden" id="' + position + '_' + type + '_editor-container_' + customBoxCount + '_content" name="' + position + '_' + type + '_editor-container_' + customBoxCount + '"/>';

    textBlock += '<span id="' + position + '_' + type + '_editor-container_' + customBoxCount + '_error" class="invalid-feedback" role="alert" style="display:none;">';
    textBlock += '<strong>Debe ingresar un texto (max. 12000 car.)</strong>';
    textBlock += '</span>';

    return textBlock;
}

function getImageBlock(type, position, image) {

    var imageBlock = '';
    imageObjects.push(position + '_' + type + '_image_' + customBoxCount);

    imageBlock += '<label>Imagen</label>';
    imageBlock += '<input type="file" id="' + position + '_' + type + '_image_' + customBoxCount + '" name="' + position + '_' + type + '_image_' + customBoxCount + '" class="form-control article_image"/>';
    imageBlock += '<div id="preview_' + position + '_' + type + '_image_' + customBoxCount + '" class="text-center">';
    if (image.length > 0) {
        imageBlock += '<img src="' + image + '" class="img-responsive article_image_preview"/>';
    }
    imageBlock += '</div>';
    imageBlock += '<span id="' + position + '_' + type + '_image_' + customBoxCount + '_error" class="invalid-feedback" role="alert" style="display:none;">';
    imageBlock += '<strong>Debe seleccionar una imagen (png, gif, jpg, jpeg) max. 1MB</strong>';
    imageBlock += '</span>';

    return imageBlock;
}

function getVideoBlock(type, position, video) {

    var videoBlock = '';
    videoObjects.push(position + '_' + type + '_video_' + customBoxCount);

    videoBlock += '<label>Video</label>';
    videoBlock += '<input type="file" id="' + position + '_' + type + '_video_' + customBoxCount + '" name="' + position + '_' + type + '_video_' + customBoxCount + '" class="form-control article_video"/>';
    videoBlock += '<div id="preview_' + position + '_' + type + '_video_' + customBoxCount + '" class="text-center">';
    if (video.length > 0) {
        videoBlock += '<video class="img-responsive article_video_preview" controls>';
        videoBlock += '<source src="' + video + '">';
        videoBlock += 'Your browser does not support HTML5 video.';
        videoBlock += '</video>';
    }
    videoBlock += '</div>';
    videoBlock += '<span id="' + position + '_' + type + '_video_' + customBoxCount + '_error" class="invalid-feedback" role="alert" style="display:none;">';
    videoBlock += '<strong>Debe seleccionar un video (mp4) max. 10MB</strong>';
    videoBlock += '</span>';

    return videoBlock;
}

function getRemoveBlockBtn() {

    var btn = '';

    btn += '<div class="custom_block_remove">';
    btn += '<button type="button" class="btn btn-outline-danger remove_block_btn" data-block_id="' + customBoxCount + '">X</button>';
    btn += '</div>';

    return btn;
}

function getAddBlockBtn() {

    var btn = '';
    var order = currentOrder + 1;

    btn += '<div id="add_custom_block_' + customBoxCount + '" class="add_custom_block_box">';
    btn += '<button type="button" class="btn btn-outline-success add_custom_block" data-order="' + order + '">+</button>';
    btn += '</div>';

    return btn;
}

function initTextEditor(type, position) {

    var quill = new Quill('#' + position + '_' + type + '_editor-container_' + customBoxCount, {
        modules: {
            syntax: true,
            toolbar: '#toolbar-container_' + customBoxCount
        },
        placeholder: 'Texto',
        theme: 'snow'
    });

    quillObjects.push(quill);
}

$(document).on('click', '.remove_block_btn', function () {

    $('#deleteBlockModal').modal('show');
    delBlockButtonId = $(this).data("block_id");
});

function deleteCustomBlock(delBlockButtonId) {
    
    delBlocks.push(delBlockButtonId);
    
    console.log(delBlocks);

    $('#add_custom_block_' + delBlockButtonId).fadeOut("slow", function () {
        $(this).remove();
    });

    $('#custom_block_' + delBlockButtonId).fadeOut("slow", function () {
        $(this).remove();
    });

    $('#deleteBlockModal').modal('hide');
}

$(document).on('change', '.article_image', function () {
    setImagePreview(this, $(this).attr('id'));
});

function setImagePreview(input, id) {

    $('#' + id + '_error').hide();
    $('#' + id).removeClass('is-invalid');
    var imageExtensions = ["png", "gif", "jpg", "jpeg"];

    if (input.files && input.files[0]) {

        var imageName = $('#' + id).val();
        var imageExt = imageName.substring(imageName.lastIndexOf('.') + 1).toLowerCase();

        if (!imageExtensions.includes(imageExt) || input.files[0].size > 1048576) {
            $('#' + id + '_error').show();
            $('#' + id).addClass('is-invalid');
            $('#' + id).val('');
            $('#preview_' + id).html('');
            return false;
        }

        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_' + id).html('<img src="' + e.target.result + '" class="img-responsive article_image_preview"/>');
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("change", ".article_video", function (evt) {
    setVideoPreview(this, $(this).attr('id'));
});

function setVideoPreview(input, id) {

    $('#' + id + '_error').hide();
    $('#' + id).removeClass('is-invalid');
    var videoExtensions = ["mp4"];
    var videoName = $('#' + id).val();
    var videoExt = videoName.substring(videoName.lastIndexOf('.') + 1).toLowerCase();

    if (!videoExtensions.includes(videoExt) || input.files[0].size > 10485760) {
        $('#' + id + '_error').show();
        $('#' + id).addClass('is-invalid');
        $('#' + id).val('');
        $('#preview_' + id).html('');
        return false;
    }

    var video = '';

    video += '<video class="img-responsive article_video_preview" controls>';
    video += '<source src="' + URL.createObjectURL(input.files[0]) + '">';
    video += 'Your browser does not support HTML5 video.';
    video += '</video>';

    $('#preview_' + id).html(video);
}

function setMaxBlockId(blockId) {

    customBoxCount = blockId;
}

function setCustomBlockOrder() {

    $(".add_custom_block").each(function () {
        if (parseInt($(this).data("order")) > currentOrder) {
            $(this).data("order", parseInt($(this).data("order")) + 1);
            //console.log($(this).data("order") + " > " + currentBlock.data("order"));
        }
    });

    $(".block_order").each(function () {
        if (parseInt($(this).val()) >= currentOrder) {
            $(this).val(parseInt(parseInt($(this).val()) + 1));
            console.log($(this).val() + " > " + currentBlock.data("order") + " => " + parseInt(parseInt($(this).val()) + 1));
        }
    });

}