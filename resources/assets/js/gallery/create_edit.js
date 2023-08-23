'use strict';

document.addEventListener('DOMContentLoaded', loadGalleryCreateEditData)

function loadGalleryCreateEditData () {
    $('#countryID, #stateID').
        select2({
            width: '100%',
        })
        listen('change', '#langId', function () {
            $.ajax({
                url: route('album-list'),
                type: 'get',
                dataType: 'json',
                data: {langId: $(this).val()},
                success: function (data) {
                    $('#categoryId').empty()
                    $('#categoryId').select2({
                        placeholder: Lang.get('messages.common.select_category'),
                        allowClear: false,
                    })
                    $('#albumId').empty()
                    $('#albumId').select2({
                        placeholder: Lang.get('messages.gallery.select_album'),
                        allowClear: false,
                    })
                    $('#albumId').append(
                        $('<option value=""></option>').text(Lang.get('messages.gallery.select_album')))
                    $.each(data.data, function (i, v) {
                        $('#albumId').append($('<option></option>').attr('value', i).text(v))
                    })

                    if (isEdit && albumId) {
                        $('#albumId').val(albumId).trigger('change')
                    }
                },
            })
        })

        listen('change', '#albumId', function () {
            $.ajax({
                url: route('album-category-list'),
                type: 'get',
                dataType: 'json',
                data: {
                    albumId: $(this).val(),
                    langId: $('#langId').val(),
                },
                success: function (data) {
                    $('#categoryId').empty()
                    $('#categoryId').select2({
                        placeholder: Lang.get('messages.common.select_category'),
                        allowClear: false,
                    })
                    $.each(data.data, function (i, v) {
                        $('#categoryId').append($('<option></option>').attr('value', i).text(v))
                    })

                    if (isEdit && categoryId) {
                        $('#categoryId').val(categoryId).trigger('change')
                    }
                },
            })
        })

    if (isEdit && langId) {
        $('#langId').val(langId).trigger('change');
    }

    function previewImages () {

        var $preview = $('#preview').empty()
        if (this.files) $.each(this.files, readAndPreview)

        function readAndPreview (i, file) {

            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return toastr.error(file.name + " " + Lang.get('messages.common.image_warning'));
            } 

            var reader = new FileReader()

            $(reader).on('load', function () {
                $preview.append($('<img/>', { src: this.result})
                .addClass('border-color'))
            })

            reader.readAsDataURL(file)

        }

    }

        listen('change', '#newImage', previewImages)

}
