'use strict';

document.addEventListener('DOMContentLoaded', loadCreateEditPageData)

function loadCreateEditPageData() {

    listen('keyup',"#titlePage",function() {
        var Text = $.trim($(this).val());
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#pageSlug").val(Text);
        $("#slugHidden").val(Text);
    });

    listen('click', '.btn-add-image', function () {
        $('#fileModal').modal('show')
        imageData()
    })

    function imageData() {
        $.ajax({
            url: route('editor.image-get'),
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#fileModal').modal('show')
                    $.each(result.data, function (key, value) {
                        let imageData = {
                            imageId: value.id,
                            imgUrl: value.imageUrls,
                            imgName: value.imageUrls.substring(
                                value.imageUrls.lastIndexOf('/') + 1),
                        }
                        let dataTemplate = prepareTemplateRender(
                            '#imageTemplate', imageData)
                        $('.uploaded-img').append(dataTemplate)
                    })
                }
            },
        })
    }

    listen('hidden.bs.modal', '#fileModal', function () {
        $('#newImage').val('')
        $('.uploaded-img').empty()
        $('.modal-footer').addClass('d-none')
    })

    listen('click', '.btn-check', function () {
        $('.modal-footer').removeClass('d-none')
    })

    listen('click', '.select-image', function () {
        let imgUrl = $('input[name="preview_img"]:checked').val()
        $('#fileModal').modal('hide')
        let oldContent = tinyMCE.activeEditor.getContent()
        tinymce.activeEditor.setContent(
            oldContent + '<img class="images" src=' + imgUrl +
            ' data-mce-src=' + imgUrl + '>')
    })
    listen('change', '#newImage', function () {
        if (this.files && this.files[0]) {
            let image = this.files[0]
            let formData = new FormData()
            formData.append('image', image)
            $.ajax({
                type: 'POST',
                url: route('editor.image-upload'),
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    displaySuccessMessage(result.message)
                    let dataTemplate = prepareTemplateRender('#imageTemplate', {
                        imgUrl: result.data.url,
                        imgName: result.data.url.substring(
                            result.data.url.lastIndexOf('/') + 1),
                        imageId: result.data.mediaId
                    })
                    $('#newImage').val('')
                    $('.uploaded-img').append(dataTemplate)
                },
                error: function (result) {
                    displayErrorMessage(result.responseJSON.message)
                },
            })
        }
    })
    listen('click', '.image-delete-btn', function (event) {
        let deleteImageId = $('input[name="preview_img"]:checked').attr('data-id');
        $.ajax({
            url: route('post-image.destroy', deleteImageId),
            type: 'get',
            success: function (result) {
                let id = result.data.id
                if (result) {
                    $('#image-' + id).hide()
                    $('.modal-footer').addClass('d-none')
                }
                displaySuccessMessage(result.message)
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message)
            },
        })
    })
}
